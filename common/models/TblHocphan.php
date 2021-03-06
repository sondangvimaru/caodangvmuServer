<?php

namespace common\models;

use common\models\TblPhanlhp\TblKhoasv;
use Yii;

/**
 * This is the model class for table "tbl_hocphan".
 *
 * @property string $mahocphan
 * @property string $tenhocphan
 * @property int $sotinchi
 * @property int $ky
 * @property string $manganh
 * @property string|null $mamontienquyet
 * @property TblKhoasv $khoa_id;
 * @property TblDiem[] $tblDiems
 * @property TblNganh $manganh0
 * @property TblLophocphan[] $tblLophocphans
 */
class TblHocphan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_hocphan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mahocphan', 'tenhocphan', 'sotinchi', 'manganh','ky','khoa_id'], 'required'],
            [['sotinchi','ky'], 'integer'],
            [['mahocphan'], 'string', 'max' => 20],
            [['tenhocphan'], 'string', 'max' => 400],
            [['manganh', 'mamontienquyet'], 'string', 'max' => 40],
            [['mahocphan'], 'unique'],
            [['manganh'], 'exist', 'skipOnError' => true, 'targetClass' => TblNganh::className(), 'targetAttribute' => ['manganh' => 'manganh']],
            [['khoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblKhoasv::className(), 'targetAttribute' => ['khoa_id' => 'khoa_id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mahocphan' => 'Mã học phần',
            'tenhocphan' => 'Tên học phần',
            'sotinchi' => 'Số tín chỉ',
            'manganh' => 'Ngành',
            'mamontienquyet' => 'Môn tiên quyết',
            'ky'=>"Kỳ",
            'khoa_id'=>"Khóa"
        ];
    }

    /**
     * Gets query for [[TblDiems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblDiems()
    {
        return $this->hasMany(TblDiem::className(), ['mahocphan' => 'mahocphan']);
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

    public function  getkhoa_id()
    {
        return $this->hasOne(TblNganh::className(), ['khoa_id' => 'khoa_id']);
    }

    /**
     * Gets query for [[TblLophocphans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblLophocphans()
    {
        return $this->hasMany(TblLophocphan::className(), ['mahocphan' => 'mahocphan']);
    }

public function beforeDelete()
{
    $lophocphans =  TblLophocphan::findAll(['mahocphan'=>$this->mahocphan]);

    foreach ($lophocphans as $lophocphan)
    {
        $lophocphan->delete();
    }
    return parent::beforeDelete(); // TODO: Change the autogenerated stub
}
}
