<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblDiem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-diem-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'diemX')->textInput(["type"=>"number","step"=>"0.1","max"=>"10","min"=>"0"]) ?>

    <?= $form->field($model, 'diemY')->textInput(["type"=>"number","step"=>"0.1"])?>

    <?= $form->field($model, 'diemZ')->textInput(["type"=>"number","step"=>"0.1"]) ?>

    <?= $form->field($model, 'ghichu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mahocphan')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\TblHocphan::find()->all(),"mahocphan","tenhocphan"),
        ['prompt'=>'--Chọn--']) ?>

<?php
    echo  $form->field($model, 'dotdk_id')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblDotdk::find()->all(),"dotdk_id","name"),
        'options' => ['placeholder' => 'Đợt Đăng Ký'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    <?php
    if(isset($update))
    {
        echo $form->field($model, 'msv')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\TblSinhvien::find()->all(), "msv", "msv"),
            ['prompt' => '--Chọn--','disabled'=>"disabled"]) ;
    }else
    {
       echo $form->field($model, 'msv')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\TblSinhvien::find()->all(), "msv", "msv"),
            ['prompt' => '--Chọn--']) ;
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
