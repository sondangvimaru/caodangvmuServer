<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;

/* @var $this yii\web\View */
/* @var $model common\models\TblThongbao */
/* @var $form yii\widgets\ActiveForm */

?>

<?php $this->registerJsFile('../../../caodangvmu/ckeditor/ckeditor.js', [yii\web\JqueryAsset::className()]); ?>

<div class="tbl-thongbao-form">



    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'kind_current')->textInput([ 'type'=>'hidden','value' => "0","id"=>"kind_current"]) ?>
    <?= $form->field($model, 'tieude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'noidung')->textarea(['maxlength'=>true,'style'=>['height'=>'400px']]) ?>
    <b><h3>Gửi Theo</h3></b>
    <div onclick="click_filtter();" >
    <input  checked type="radio" id="sv" name="theo" value="selectsv">
    
    <label for="sv">Theo Sinh viên</label><br>
  <input type="radio" id="khoa" name="theo" value="selectkhoa">
  <label for="female">Theo Khoa</label><br>
  <input type="radio" id="nganh" name="theo" value="selectnganh">
  <label for="nganh">Theo Ngành</label>
  <br>
  <input type="radio" id="lhc" name="theo" value="selectlhc">
  <label for="lhc">Theo Lớp Hành Chính</label>
        </div>

    <?php
    echo  $form->field($model, 'khoa')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblKhoa::find()->all(),"makhoa","tenkhoa"),
        'options' => ['placeholder' => 'Khoa','id'=>'selectkhoa'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
 <?php
    echo  $form->field($model, 'nganh')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblNganh::find()->all(),"manganh","tennganh"),
        'options' => ['placeholder' => 'Ngành','id'=>'selectnganh'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
 <?php
    echo  $form->field($model, 'lhc')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblLophanhchinh::find()->all(),"malophanhchinh","tenlophc"),
        'options' => ['placeholder' => 'Lớp Hành Chính','id'=>'selectlhc'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
 <?php
    echo  $form->field($model, 'msv')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblSinhvien::find()->all(),"msv","msv"),
        'options' => ['placeholder' => 'Mã sinh viên','id'=>'selectsv'],
        'pluginOptions' => [
            'allowClear' => true,
            'id'=>'aaaa'
        ],
    ]);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
 var options = document.getElementsByName("theo");
 for(var i = 0; i < options.length; i++) {
   if(options[i].value!="selectsv")
   {

   
    var v=document.getElementsByClassName("form-group field-"+options[i].value);
 
 v[0].style.display="none";
    
   } 
       
       
 }
function click_filtter()
{
    var options = document.getElementsByName("theo");
 

for(var i = 0; i < options.length; i++) {
   if(options[i].checked)
   {

    document.getElementById("kind_current").value=i;
    var v=document.getElementsByClassName("form-group field-"+options[i].value);
 
        v[0].style.display="block";
      
    
   }else
   {
    var v=document.getElementsByClassName("form-group field-"+options[i].value);
        
       
        v[0].style.display="none";

   }
       
       
 }
 
 
}
</script>