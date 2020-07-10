<?php

namespace common\models\TblPhanlhp;

use Yii;

/**
 * This is the model class for table "tbl_thongbao".
 *
 * @property int $id
 * @property string $tieude
 * @property string $noidung
 * @property int|null $msv
 *
 * @property TblSinhvien $msv0
 */
class TblThongbao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_thongbao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tieude', 'noidung'], 'required'],
            [['noidung'], 'string'],
            [['msv'], 'integer'],
            [['tieude'], 'string', 'max' => 200],
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
            'tieude' => 'Tieude',
            'noidung' => 'Noidung',
            'msv' => 'Msv',
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
