<?php

namespace common\models\TblPhanlhp;

use common\models\TblSinhvien;
use Yii;

/**
 * This is the model class for table "tbl_feedback".
 *
 * @property int $id
 * @property int $msv
 * @property string $content
 * @property bool $from_user
 * @property string $type
 * @property int $stt
 * @property string $time
 *
 * @property TblSinhvien $msv0
 */
class TblFeedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['msv', 'content', 'type', 'stt', 'time'], 'required'],
            [['msv', 'stt'], 'integer'],
            [['content'], 'string'],
            [['from_user'], 'boolean'],
            [['time'], 'safe'],
            [['type'], 'string', 'max' => 30],
            [['msv'], 'exist', 'skipOnError' => true, 'targetClass' => TblSinhvien::className(), 'targetAttribute' => ['msv' => 'msv']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'msv' => 'Msv',
            'content' => 'Content',
            'from_user' => 'From User',
            'type' => 'Type',
            'stt' => 'Stt',
            'time' => 'Time',
        ];
    }

    /**
     * Gets query for [[Msv0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMsv0()
    {
        return $this->hasOne(TblSinhvien::className(), ['msv' => 'msv']);
    }
}
