<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_thongbao".
 *
 * @property int $id
 * @property string $tieude
 * @property string $noidung

 * @property int $msv
 *
 * @property TblMedia $media
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

     public $khoa;
     public $nganh;
     public $lhc;
     public $kind_current;
    public function rules()
    {
        return [
            [['tieude','noidung', ], 'required'],
            [['msv','kind_current'], 'integer'],
            [['tieude'], 'string', 'max' => 200],
            [['noidung'], 'string'],
            [['nganh'], 'string'],
            [['lhc'], 'string'],
            [['khoa'], 'string'],
            [['msv'], 'exist', 'skipOnError' => true, 'targetClass' => TblSinhvien::className(), 'targetAttribute' => ['msv' => 'msv']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kind_current'=>' ',
            'id' => 'ID',
            'tieude' => 'Tiêu đề',
            'noidung' => 'Nội dung',
            'nganh'=>"Ngành",
            'lhc'=>'Lớp Hành chính',
            'khoa'=>'Khoa',
            'msv' => 'Mã sinh viên',

        ];
    }

    /**
     * Gets query for [[Media]].
     *
     * @return \yii\db\ActiveQuery
     */

    /**
     * Gets query for [[Msv0]].
     *
     * @return \yii\db\ActiveQuery
     */

     public function beforeSave($insert)
     {

            if($this->kind_current==1)
            {
                $this->kind_current=0;

            $list_nganh= TblNganh::findAll(["makhoa"=>$this->khoa]);
                foreach($list_nganh as $n)
                {
                    $list_sv_tmp= TblSinhvien::findAll(["manganh"=>$n->manganh]);
                    foreach($list_sv_tmp as $sv)
                    {
                        $newtb= new TblThongbao();
                        $newtb->tieude=$this->tieude;
                        $newtb->noidung=$this->noidung;
                        $newtb->msv=$sv->msv;
                        $newtb->save();

                    }
                }
                ?>
                <script>alert("Them thanh cong");
             window.location="http://localhost:4432/caodangvmu/backend/web/index.php?r=tbl-thongbao%2Findex";
             </script>
                 <?php
            }
            else   if($this->kind_current==2)
            {
                $this->kind_current=0;
                $list_sv_tmp= TblSinhvien::findAll(["manganh"=>$this->nganh]);
                foreach($list_sv_tmp as $sv)
                {
                    $newtb= new TblThongbao();
                    $newtb->tieude=$this->tieude;
                    $newtb->noidung=$this->noidung;
                    $newtb->msv=$sv->msv;
                    $newtb->save();

                }
             
                ?>
                <script>alert("Them thanh cong");
             window.location="http://localhost:4432/caodangvmu/backend/web/index.php?r=tbl-thongbao%2Findex";
             </script>
                 <?php
            }else  if($this->kind_current==3)
            {
                $this->kind_current=0;
                $list_sv_tmp= TblSinhvien::findAll(["malophanhchinh"=>$this->lhc]);
                foreach($list_sv_tmp as $sv)
                {
                    $newtb= new TblThongbao();
                    $newtb->tieude=$this->tieude;
                    $newtb->noidung=$this->noidung;
                    $newtb->msv=$sv->msv;
                    $newtb->save();

                }
                ?>
               <script>alert("Them thanh cong");
            window.location="http://localhost:4432/caodangvmu/backend/web/index.php?r=tbl-thongbao%2Findex";
            </script>
                <?php
                
            }else

     
        return  parent::beforeSave($insert);
     }
    public function getMsv0()
    {
        return $this->hasOne(TblSinhvien::className(), ['msv' => 'msv']);
    }
}
