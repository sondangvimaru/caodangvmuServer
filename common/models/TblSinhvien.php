<?php

namespace common\models;

use common\models\TblPhanlhp\TblFeedback;
use Yii;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "tbl_sinhvien".
 *
 * @property int $msv
 * @property string $ten
 * @property string $ngaysinh
 * @property bool $gioitinh
 * @property string $diachi
 * @property string $manganh
 * @property string $malophanhchinh
 * @property string $tenlophc
 * @property string $sdt
 * @property bool|null $tongiao
 * @property string|null $trinhdohocvan
 * @property string|null $ngayketnapdoan
 * @property string|null $hotenbo
 * @property string|null $hotenme
 * @property string|null $nghenghiepbo
 * @property string|null $nghenghiepme
 * @property string|null $doituongthuocdienchinhsach
 * @property string|null $nghenghieplamtruockhivaohoc
 * @property string|null $noidangkythuongtru
 * @property string|null $nguyenvongvieclam
 * @property int $id_dantoc
 * @property string $quequan
 * @property string|null $anh_dai_dien
 * @property string|null $ten_thuong_goi
 * @property string $noi_sinh
 * @property string|null $ngay_tham_gia_dcsvn
 * @property string|null $ngay_chinh_thuc_tg_dcsvn
 * @property string|null $ho_va_ten_vo_chong
 * @property string|null $nghe_nghiep_vo_chong
 *
 * @property SvUser[] $svUsers
 * @property TblDangkyhocphan[] $tblDangkyhocphans
 * @property TblDiem[] $tblDiems
 * @property TblDantoc $dantoc
 * @property TblLophanhchinh $malophanhchinh0
 * @property TblNganh $manganh0
 * @property TblThongbao[] $tblThongbaos
 */
class TblSinhvien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_sinhvien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['msv', 'ten', 'ngaysinh', 'diachi', 'manganh', 'malophanhchinh', 'sdt', 'id_dantoc', 'quequan', 'noi_sinh'], 'required'],
            [['msv', 'id_dantoc'], 'integer'],
            [['ngaysinh', 'ngayketnapdoan', 'ngay_tham_gia_dcsvn', 'ngay_chinh_thuc_tg_dcsvn'], 'safe'],
            [['gioitinh', 'tongiao'], 'boolean'],
            [['ten', 'anh_dai_dien', 'noi_sinh', 'ho_va_ten_vo_chong', 'nghe_nghiep_vo_chong'], 'string', 'max' => 100],
            [['diachi'], 'string', 'max' => 2000],
            [['manganh', 'malophanhchinh'], 'string', 'max' => 20],
            [['sdt'], 'string', 'max' => 12],
            [['trinhdohocvan', 'hotenbo', 'hotenme', 'nghenghiepbo', 'nghenghiepme', 'doituongthuocdienchinhsach', 'nghenghieplamtruockhivaohoc', 'noidangkythuongtru', 'nguyenvongvieclam'], 'string', 'max' => 45],
            [['quequan'], 'string', 'max' => 1000],
            [['ten_thuong_goi'], 'string', 'max' => 50],
            [['msv'], 'unique'],
            [['id_dantoc'], 'exist', 'skipOnError' => true, 'targetClass' => TblDantoc::className(), 'targetAttribute' => ['id_dantoc' => 'id_dantoc']],
            [['malophanhchinh'], 'exist', 'skipOnError' => true, 'targetClass' => TblLophanhchinh::className(), 'targetAttribute' => ['malophanhchinh' => 'malophanhchinh']],
            [['manganh'], 'exist', 'skipOnError' => true, 'targetClass' => TblNganh::className(), 'targetAttribute' => ['manganh' => 'manganh']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'msv' => 'Mã sinh viên',
            'ten' => 'Tên',
            'ngaysinh' => 'Ngày sinh',
            'gioitinh' => 'Giới tính',
            'diachi' => 'Địa chỉ',
            'manganh' => 'Mã ngành',
            'malophanhchinh' => 'Mã lớp hành chính',
            'sdt' => 'Số điện thoại',
            'tongiao' => 'Tôn giáo',
            'trinhdohocvan' => 'Trình độ học vấn',
            'ngayketnapdoan' => 'Ngày kết nạp đoàn',
            'hotenbo' => 'Họ và tên bố',
            'hotenme' => 'Họ và tên mẹ',
            'nghenghiepbo' => 'Nghề nghiệp bố',
            'nghenghiepme' => 'Nghề nghiệp mẹ',
            'doituongthuocdienchinhsach' => 'Đối tượng thuộc diện chính sách',
            'nghenghieplamtruockhivaohoc' => 'Nghề nghiệp làm trước khi vào học',
            'noidangkythuongtru' => 'Nơi đăng ký thường trú',
            'nguyenvongvieclam' => 'Nguyện vọng việc làm',
            'id_dantoc' => 'Dân tộc',
            'quequan' => 'Quê quán',
            'anh_dai_dien' => 'Ảnh đại diện',
            'ten_thuong_goi' => 'Tên thường gọi',
            'noi_sinh' => 'Nơi sinh',
            'ngay_tham_gia_dcsvn' => 'Ngày tham gia ĐCSVN',
            'ngay_chinh_thuc_tg_dcsvn' => 'Ngày chính thức tham gia ĐCSVN',
            'ho_va_ten_vo_chong' => 'Họ và tên vợ chồng',
            'nghe_nghiep_vo_chong' => 'Nghề nghiệp vợ chồng',
        ];
    }

    /**
     * Gets query for [[SvUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSvUsers()
    {
        return $this->hasMany(SvUser::className(), ['msv' => 'msv']);
    }

    /**
     * Gets query for [[TblDangkyhocphans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblDangkyhocphans()
    {
        return $this->hasMany(TblDangkyhocphan::className(), ['msv' => 'msv']);
    }

    /**
     * Gets query for [[TblDiems]].
     *
     * @return \yii\db\ActiveQuery
     */

    
    public function getTblDiems()
    {
        return $this->hasMany(TblDiem::className(), ['msv' => 'msv']);
    }

    /**
     * Gets query for [[Dantoc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDantoc()
    {
        return $this->hasOne(TblDantoc::className(), ['id_dantoc' => 'id_dantoc']);
    }

    /**
     * Gets query for [[Malophanhchinh0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMalophanhchinh0()
    {
        return $this->hasOne(TblLophanhchinh::className(), ['malophanhchinh' => 'malophanhchinh']);
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
     * Gets query for [[TblThongbaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblThongbaos()
    {
        return $this->hasMany(TblThongbao::className(), ['msv' => 'msv']);
    }
    public function beforeSave($insert)
    {
        $rr=explode("-",$this->ngaysinh);
        //$rrr=explode("-",$this->ngay_tham_gia_dcsvn);
        //$rrrr=explode("-",$this->ngay_chinh_thuc_tg_dcsvn);
        date_default_timezone_set('Asia/Bangkok');
        $date = date('d-m-Y');
        $r=explode("-",$date);

        if((intval($r[2])-intval($rr[2]))<18)
        {
            ?>
            <script>alert("Người này chưa đủ 18 tuổi !")</script>
            <?php
            return;
        }
//        if((intval($r[2])-intval($rrr[2]))>18)
//        {
//           ?>
<!--            <script>alert("Người này chưa đủ 18 tuổi để kết nạp Đoàn !")</script>-->
<!--            --><?php
//            return;
//        }
//        if((intval($r[2])-intval($rrrr[2]))>18)
//        {
//            ?>
<!--            <script>alert("Người này chưa tuổi 18 tuổi để kết nạp Đoàn!")</script>-->
<!--            --><?php
//            return;
//        }



        $this->ngaysinh = API_H17::convertDMYtoYMD($this->ngaysinh);
        $this->ngayketnapdoan = API_H17::convertDMYtoYMD($this->ngayketnapdoan);
        $this->ngay_tham_gia_dcsvn = API_H17::convertDMYtoYMD($this->ngay_tham_gia_dcsvn);
        $this->ngay_chinh_thuc_tg_dcsvn = API_H17::convertDMYtoYMD($this->ngay_chinh_thuc_tg_dcsvn);

        $file = UploadedFile::getInstance($this,'anh_dai_dien');

        if(!is_null($file))
        {
            $time = time();
            $ten_file = API_H17::createCode($this->ten);
            $type = API_H17::get_extension($file->type);
            $ten_file = "{$time}_avata-{$ten_file}{$type}";
            $this->anh_dai_dien = $ten_file;
            if(!$insert) {
                $sinhviencu = self::findOne($this->msv);
                Yii::$app->session->set('old_name_logo', $sinhviencu->anh_dai_dien);
            }
        }
        else{
            if($insert)
                $this->anh_dai_dien = 'no-image.jpg';
            else
            {
                $sinhviencu = self::findOne($this->msv);
                $this->anh_dai_dien = $sinhviencu->anh_dai_dien;
            }
        }


        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
    public function afterSave($insert, $changedAttributes)
    {
        $file = UploadedFile::getInstance($this,'anh_dai_dien');

        if(!is_null($file)){
            $ten_file = $this->anh_dai_dien;
            $path = dirname(dirname(__DIR__)).'/images/'.$ten_file;
            $file->saveAs($path);

            if(!$insert)
            {
                $ten_file_cu = Yii::$app->session->get('old_name_logo');
                if($ten_file_cu !='no-image.jpg')
                {
                    $path = dirname(dirname(__DIR__)).'/images/'.$ten_file_cu;
                    if(is_file($path))
                        unlink($path);
                }
            }
        }

        $sv_user = new SvUser();
        $sv_user->msv = $this->msv;
        $sv_user->password = "123456a@";
        $sv_user->status = '1';
        $sv_user->save();
//        VarDumper::dump($sv_user,10,true);
//        exit();
//        $s = SvUser::findOne(['msv'=>$this->msv]);

        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function beforeDelete()
    {
        if($this->anh_dai_dien!='no-image.jpg')
        {
            $path = dirname(dirname(__DIR__)).'/images/'.$this->anh_dai_dien;
            if(is_file($path))
                unlink($path);
        }
        try {
            $dkhp=TblDangkyhocphan::findAll(["msv"=>$this->msv]);
            foreach ($dkhp as $dk)
            {
                $dk->delete();
            }
            $diems=TblDiem::findAll(["msv"=>$this->msv]);
            foreach ($diems as $d)
            {
                $d->delete();
            }
            $tbs=TblThongbao::findAll(["msv"=>$this->msv]);
            foreach ($tbs as $tb)
            {
                $tb->delete();
            }
            $sv_user = SvUser::findAll(['msv'=>$this->msv]);
            foreach ($sv_user as $sv)
            {
                $sv->delete();
            }

            $fb=TblFeedback::findAll(["msv"=>$this->msv]);
            foreach ($fb as $f)
            {
                $f->delete();
            }
        }catch (Exception $e)
        {

        }




        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

}
