<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblGiangvien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-giangvien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_giangvien')->textInput() ?>

    <?= $form->field($model, 'tengiangvien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manganh')->dropDownList(
        \yii\helpers\ArrayHelper::map(\common\models\TblNganh::find()->all(),'manganh','tennganh'),
        ['prompt'=>'--Chọn--']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
