<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblTendanhmuc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-tendanhmuc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'danhmuc_id')->textInput() ?>

    <?= $form->field($model, 'tendanhmuc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
