<?php

namespace common\models\TblPhanlhp;

use Yii;

/**
 * This is the model class for table "tbl_khoasv".
 *
 * @property int $khoa_id
 *
 * @property TblCtdt[] $tblCtdts
 * @property TblHocphan[] $tblHocphans
 */
class TblKhoasv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_khoasv';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['khoa_id'], 'required'],
            [['khoa_id'], 'integer'],
            [['khoa_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'khoa_id' => 'Khoa ID',
        ];
    }

    /**
     * Gets query for [[TblCtdts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblCtdts()
    {
        return $this->hasMany(TblCtdt::className(), ['khoa_id' => 'khoa_id']);
    }

    /**
     * Gets query for [[TblHocphans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblHocphans()
    {
        return $this->hasMany(TblHocphan::className(), ['khoa_id' => 'khoa_id']);
    }
}
