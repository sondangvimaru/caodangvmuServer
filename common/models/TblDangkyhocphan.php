<?php

namespace common\models;

use Exception;
use Yii;

/**
 * This is the model class for table "tbl_dangkyhocphan".
 *
 * @property int $id
 * @property string $thoigiandangky
 * @property int $lophp_id
 * @property int $msv
 *
 * @property TblLophocphan $lophp
 * @property TblSinhvien $msv0
 */
class TblDangkyhocphan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_dangkyhocphan';
    }

    /**
     * {@inheritdoc}
     */
    public $tenlophp;
    public function rules()
    {
        return [
            [['thoigiandangky', 'lophp_id', 'msv'], 'required'],
            [['thoigiandangky'], 'safe'],
            [['tenlophp'], 'safe'],
            [['lophp_id', 'msv'], 'integer'],
            [['lophp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblLophocphan::className(), 'targetAttribute' => ['lophp_id' => 'lophp_id']],
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
            'thoigiandangky' => 'Thời gian đăng ký',
            'lophp_id' => '',
            'msv' => 'Mã sinh viên',
            'tenlophp'=>'Lớp Học Phần'
        ];
    }

    /**
     * Gets query for [[Lophp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLophp()
    {
        return $this->hasOne(TblLophocphan::className(), ['lophp_id' => 'lophp_id']);
    }

    
    /**
     * Gets query for [[Msv0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function beforeSave($insert)
    {
        date_default_timezone_set('Asia/Bangkok');
        $date = date('Y-m-d H:i:s');
        $this->thoigiandangky=$date;
        $file= fopen("newdotdk.txt","r");
    
            $line = fgets($file);
            
           
            
           try{
               
           
            if($line!=null && $line!=" ")
            {
                $lhp= TblLophocphan::findAll(["dotdk_id"=>trim($line)]);
               

               $this->lophp_id= $lhp[intval(($this->tenlophp))]->lophp_id;
            
          
               $check=TblDangkyhocphan::findOne(["msv"=>$this->msv,"lophp_id"=>$this->lophp_id]);
               if($check!=null)
               {
                   ?>
                   <script>
                       alert("Sinh viên này đã được đăng ký vào lớp từ trước!");
                   </script>
                   <?php
                   return;
               }else
               {
                $newdiem= new TblDiem();
                $newdiem->diemX=null;
                $newdiem->diemY=null;
                $newdiem->diemZ=null;
                $newdiem->msv=$this->msv;
                $newdiem->dotdk_id=$line;
                $lhp= TblLophocphan::findOne(["lophp_id"=>$this->lophp_id]);
                $newdiem->mahocphan=$lhp->mahocphan;
    
                $newdiem->save();
    
               }
               
            }
             
        }catch(Exception $e)
        {
    
        }
          fclose($file);
        return parent::beforeSave($insert);

    }
    public function getMsv0()
    {
        return $this->hasOne(TblSinhvien::className(), ['msv' => 'msv']);
    }
}
