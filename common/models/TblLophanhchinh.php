<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_lophanhchinh".
 *
 * @property string $malophanhchinh
 * @property string $tenlophc
 * @property int $namvaotruong
 * @property int $namtotnghiep
 * @property string $manganh
 *
 * @property TblNganh $manganh0
 * @property TblSinhvien[] $tblSinhviens
 */
class TblLophanhchinh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_lophanhchinh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['malophanhchinh', 'tenlophc', 'namvaotruong', 'namtotnghiep', 'manganh'], 'required'],
            [['namvaotruong', 'namtotnghiep'], 'integer'],
            [['malophanhchinh', 'manganh'], 'string', 'max' => 20],
            [['tenlophc'], 'string', 'max' => 200],
            [['malophanhchinh'], 'unique'],
            [['manganh'], 'exist', 'skipOnError' => true, 'targetClass' => TblNganh::className(), 'targetAttribute' => ['manganh' => 'manganh']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'malophanhchinh' => 'Mã lớp hành chính',
            'tenlophc' => 'Tên lớp hành chính',
            'namvaotruong' => 'Năm vào trường',
            'namtotnghiep' => 'Năm tốt nghiệp',
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
     * Gets query for [[TblSinhviens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblSinhviens()
    {
        return $this->hasMany(TblSinhvien::className(), ['malophanhchinh' => 'malophanhchinh']);
    }
}
