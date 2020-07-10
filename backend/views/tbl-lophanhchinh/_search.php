<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\TblLophanhchinhSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-lophanhchinh-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'malophanhchinh') ?>

    <?= $form->field($model, 'tenlophc') ?>

    <?= $form->field($model, 'namvaotruong') ?>

    <?= $form->field($model, 'namtotnghiep') ?>

    <?= $form->field($model, 'manganh') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
