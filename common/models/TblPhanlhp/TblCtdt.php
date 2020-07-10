<?php

namespace common\models\TblPhanlhp;

use common\models\TblNganh;
use Yii;

/**
 * This is the model class for table "tbl_ctdt".
 *
 * @property int $id
 * @property string $nganh
 * @property int $sonam
 * @property int $khoa_id
 *
 * @property TblKhoasv $khoa
 * @property TblNganh $nganh0
 */
class TblCtdt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_ctdt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nganh', 'sonam', 'khoa_id'], 'required'],
            [['khoa_id'], 'integer'],
            [['sonam'], 'safe'],
            [['nganh'], 'string', 'max' => 20],
            [['khoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblKhoasv::className(), 'targetAttribute' => ['khoa_id' => 'khoa_id']],
            [['nganh'], 'exist', 'skipOnError' => true, 'targetClass' => TblNganh::className(), 'targetAttribute' => ['nganh' => 'manganh']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nganh' => 'Nganh',
            'sonam' => 'Sonam',
            'khoa_id' => 'Khoa ID',
        ];
    }

    /**
     * Gets query for [[Khoa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKhoa()
    {
        return $this->hasOne(TblKhoasv::className(), ['khoa_id' => 'khoa_id']);
    }

    /**
     * Gets query for [[Nganh0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNganh0()
    {
        return $this->hasOne(TblNganh::className(), ['manganh' => 'nganh']);
    }
}
