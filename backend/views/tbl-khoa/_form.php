<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblKhoa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-khoa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'makhoa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenkhoa')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
