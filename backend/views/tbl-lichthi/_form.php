<?php

use common\models\TblHocphan;
use common\models\TblLophocphan;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblLichthi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-lichthi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lichthi_id')->textInput(['type'=>'hidden','value'=>null]) ?>

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
   
     <?= $form->field($model, 'tenlophp')->dropDownList(
           $arr,
        ['prompt'=>'--Chọn--']
    ) ?>
    
    <?php $dslhp=TblLophocphan::find()->all();
    $defual_lophp_id=" ";
    if(count($dslhp)>0) $defual_lophp_id=$dslhp[0]->lophp_id;
    ?>
 <?= $form->field($model, 'lophp_id')->textInput([ 'type'=>'hidden','value' => $defual_lophp_id]) ?>

 <?php  date_default_timezone_set('Asia/Bangkok');
        $date = date('d-m-Y H:s:i');?>
    <?= $form->field($model, 'thoigian')-> textInput(['type'=>'datetime','value'=>$date])?>

    <?= $form->field($model, 'diadiem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sbd')->textInput() ?>
    <?= $form->field($model, 'hinhthuc')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
