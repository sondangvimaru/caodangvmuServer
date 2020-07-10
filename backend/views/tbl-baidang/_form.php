<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblBaidang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-baidang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'baidang_id')->textInput() ?>

    <?= $form->field($model, 'tieude')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'noidung')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'thoigiandang')->textInput() ?>

    <?= $form->field($model, 'danhmuc_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
