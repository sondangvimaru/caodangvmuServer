<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\TblDiemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-diem-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'diem_id') ?>

    <?= $form->field($model, 'diemX') ?>

    <?= $form->field($model, 'diemY') ?>

    <?= $form->field($model, 'diemZ') ?>

    <?= $form->field($model, 'ghichu') ?>

    <?php // echo $form->field($model, 'mahocphan') ?>

    <?php // echo $form->field($model, 'msv') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
