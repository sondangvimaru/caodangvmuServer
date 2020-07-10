<?php

namespace common\models;

use Exception;
use Yii;

/**
 * This is the model class for table "tbl_baidang".
 *
 * @property int $baidang_id
 * @property string $tieude
 * @property string $noidung
 * @property int $admin_id
 * @property string $thoigiandang
 * @property int $danhmuc_id
 * @property string $tukhoa
 *
 * @property AdminUser $admin
 * @property TblTendanhmuc $danhmuc
 */
class TblBaidang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_baidang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['baidang_id', 'tieude', 'noidung', 'admin_id', 'thoigiandang', 'danhmuc_id', 'tukhoa'], 'required'],
            [['baidang_id', 'admin_id', 'danhmuc_id'], 'integer'],
            [['tieude', 'noidung', 'tukhoa'], 'string'],
            [['thoigiandang'], 'safe'],
            [['baidang_id'], 'unique'],
            [['admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdminUser::className(), 'targetAttribute' => ['admin_id' => 'admin_id']],
            [['danhmuc_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblTendanhmuc::className(), 'targetAttribute' => ['danhmuc_id' => 'danhmuc_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'baidang_id' => 'Mã bài đăng',
            'tieude' => 'Tiêu đề',
            'noidung' => 'Nội dung',
            'admin_id' => 'Mã admin',
            'thoigiandang' => 'Thời gian đăng',
            'danhmuc_id' => 'Mã danh mục',
            'tukhoa' => 'Từ khóa',
        ];
    }

    public function beforeDelete()
    {
        
        try
        {

            $conn= mysqli_connect("localhost", "root", "", "newcaodang") or die ("could not connect to mysql");  

                $sql="SELECT *  FROM tbl_baidang WHERE baidang_id= ".$this->baidang_id;
               $result= $conn->query($sql);
               $r=$result->fetch_assoc();
               $filepath="../../images/".$r["anh_dai_dien"];
               unlink($filepath);

        }catch(Exception $e)
        {

        }
    
        return parent::beforeDelete();
    }
    /**
     * Gets query for [[Admin]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(AdminUser::className(), ['admin_id' => 'admin_id']);
    }

    /**
     * Gets query for [[Danhmuc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDanhmuc()
    {
        return $this->hasOne(TblTendanhmuc::className(), ['danhmuc_id' => 'danhmuc_id']);
    }
}
