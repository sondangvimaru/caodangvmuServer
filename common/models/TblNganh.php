<?php

namespace common\models;

use Yii;
use yii\db\Exception;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "tbl_nganh".
 *
 * @property string $manganh
 * @property string $tennganh
 * @property string $makhoa
 *
 * @property TblGiangvien[] $tblGiangviens
 * @property TblHocphan[] $tblHocphans
 * @property TblLophanhchinh[] $tblLophanhchinhs
 * @property TblKhoa $makhoa0
 * @property TblSinhvien[] $tblSinhviens
 */
class TblNganh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_nganh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['manganh', 'tennganh', 'makhoa'], 'required'],
            [['manganh', 'makhoa'], 'string', 'max' => 20],
            [['tennganh'], 'string', 'max' => 400],
            [['manganh'], 'unique'],
            [['makhoa'], 'exist', 'skipOnError' => true, 'targetClass' => TblKhoa::className(), 'targetAttribute' => ['makhoa' => 'makhoa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'manganh' => 'Mã ngành',
            'tennganh' => 'Tên ngành',
            'makhoa' => 'Khoa',
        ];
    }

    /**
     * Gets query for [[TblGiangviens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblGiangviens()
    {
        return $this->hasMany(TblGiangvien::className(), ['manganh' => 'manganh']);
    }

    /**
     * Gets query for [[TblHocphans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblHocphans()
    {
        return $this->hasMany(TblHocphan::className(), ['manganh' => 'manganh']);
    }

    /**
     * Gets query for [[TblLophanhchinhs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblLophanhchinhs()
    {
        return $this->hasMany(TblLophanhchinh::className(), ['manganh' => 'manganh']);
    }

    /**
     * Gets query for [[Makhoa0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMakhoa0()
    {
        return $this->hasOne(TblKhoa::className(), ['makhoa' => 'makhoa']);
    }

    /**
     * Gets query for [[TblSinhviens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblSinhviens()
    {
        return $this->hasMany(TblSinhvien::className(), ['manganh' => 'manganh']);
    }
public function beforeDelete()
{
    try {
        $hocphans = TblHocphan::findAll(['manganh'=>$this->manganh]);

        $lophanhchinhs = TblLophanhchinh::findAll(['manganh'=>$this->manganh]);
        $sinhviens =  TblSinhvien::findAll(['manganh'=>$this->manganh]);
        foreach ($sinhviens as $sinhvien)
        {
            $sinhvien->delete();
        }

        foreach ($lophanhchinhs as $lophanhchinh)
        {
            $lophanhchinh->delete();
        }
        foreach ($hocphans as $hocphan)
        {
            $hocphan->delete();
        }

    }catch (Exception $e)
    {}





    return parent::beforeDelete(); // TODO: Change the autogenerated stub
}
}
