<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_giangvien".
 *
 * @property int $id_giangvien
 * @property string $tengiangvien
 * @property string $manganh
 *
 * @property TblNganh $manganh0
 * @property TblLophocphan[] $tblLophocphans
 */
class TblGiangvien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_giangvien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_giangvien', 'tengiangvien', 'manganh'], 'required'],
            [['id_giangvien'], 'integer'],
            [['tengiangvien'], 'string', 'max' => 400],
            [['manganh'], 'string', 'max' => 40],
            [['id_giangvien'], 'unique'],
            [['manganh'], 'exist', 'skipOnError' => true, 'targetClass' => TblNganh::className(), 'targetAttribute' => ['manganh' => 'manganh']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_giangvien' => 'Mã giảng viên',
            'tengiangvien' => 'Tên giảng viên',
            'manganh' => 'Mã ngành',
        ];
    }

    /**
     * Gets query for [[Manganh0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManganh0()
    {
        return $this->hasOne(TblNganh::className(), ['manganh' => 'manganh']);
    }

    /**
     * Gets query for [[TblLophocphans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblLophocphans()
    {
        return $this->hasMany(TblLophocphan::className(), ['id_giangvien' => 'id_giangvien']);
    }
}
