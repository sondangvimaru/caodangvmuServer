<?php

use common\models\TblHocphan;
use common\models\TblLophocphan;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblDangkyhocphan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-dangkyhocphan-form">

    <?php $form = ActiveForm::begin(); ?>

<?php  date_default_timezone_set('Asia/Bangkok');
        $date = date('d-m-Y H:s:i');?>
    <?= $form->field($model, 'thoigiandangky')->textInput(['value'=>$date,'readonly' => true,]) ?>

 <?php
    try
    {
        $file= fopen("newdotdk.txt","r");

        $line = fgets($file);
        
       
        if($line!=null && $line!=" ")
        {
            $lhp= TblLophocphan::findAll(["dotdk_id"=>trim($line)]);
            $arr=array();
            foreach($lhp as $l)
            {
                
              $hp= TblHocphan::findOne(["mahocphan"=>$l->mahocphan]);
              $nhom=(intval($l->nhom)<10)?"N0".$l->nhom:"N".$l->nhom; 
            
              array_push($arr,$hp->tenhocphan." ".$nhom);
    
            }
           
           
        }
          fclose($file);
    }catch(Exception $e)
    {

    }
   
    ?>
    

<?php $dslhp=TblLophocphan::find()->all();
    $defual_lophp_id=" ";
    if(count($dslhp)>0) $defual_lophp_id=$dslhp[0]->lophp_id;
    ?>
     <?= $form->field($model, 'tenlophp')->dropDownList(
        $arr,
        ['prompt'=>'--Chọn--']
    ) ?>
 <?= $form->field($model, 'lophp_id')->textInput([ 'type'=>'hidden','value' => $defual_lophp_id]) ?>
    <?php
    echo  $form->field($model, 'msv')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblSinhvien::find()->all(),"msv","msv"),
        'options' => ['placeholder' => 'Mã sinh viên'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
