<?php

namespace common\models;

use Exception;
use Yii;

/**
 * This is the model class for table "tbl_lichthi".
 *
 * @property int $lichthi_id
 * @property int $lophp_id
 * @property string $thoigian
 * @property string $diadiem
 * @property int|null $sbd
 * @property string|null $hinthuc
 *
 * @property TblLophocphan $lophp
 */
class TblLichthi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_lichthi';
    }

    /**
     * {@inheritdoc}
     */
    public $tenlophp;
    public function rules()
    {
        return [
            [['lophp_id', 'thoigian', 'diadiem'], 'required'],
            [['lichthi_id', 'lophp_id', 'sbd'], 'integer'],
            [['thoigian'], 'safe'],
            [['diadiem'], 'string', 'max' => 200],
            [['hinhthuc'], 'string', 'max' => 45],
            [['lichthi_id'], 'unique'],
            [['tenlophp'], 'safe'],
            [['lophp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblLophocphan::className(), 'targetAttribute' => ['lophp_id' => 'lophp_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lichthi_id' => '',
            'lophp_id' => '',
            'thoigian' => 'Thời gian',
            'diadiem' => 'Địa điểm',
            'sbd' => 'Số báo danh',
            'hinhthuc' => 'Hình thức',
            'tenlophp'=>"Lớp học phần"
        ];
    }

    function beforeSave($insert)
    {

        date_default_timezone_set('Asia/Bangkok');
        $date = date('Y-m-d H:i:s');
        $this->thoigian=$date;
        $file= fopen("newdotdk.txt","r");
    
            $line = fgets($file);
            
           
            
           try{
               
            if($line!=null && $line!=" ")
            {
                $lhp= TblLophocphan::findAll(["dotdk_id"=>trim($line)]);
               
               $this->lophp_id= $lhp[intval(($this->tenlophp))]->lophp_id;
            
              
                $lichthi=TblLichthi::findOne(["lophp_id"=>$this->lophp_id]);
               
                if($lichthi!=null)
                {

                    ?>
                    <script>alert("Lớp học phần này đã có lịch thi rồi!");</script>
                    <?php
                    return;
                }
               
            }
             
        }catch(Exception $e)
        {
    
        }
          fclose($file);
         return parent::beforeSave($insert);
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
}
