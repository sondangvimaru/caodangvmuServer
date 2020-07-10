<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\TblLichthiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-lichthi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lichthi_id') ?>

    <?= $form->field($model, 'lophp_id') ?>

    <?= $form->field($model, 'thoigian') ?>

    <?= $form->field($model, 'diadiem') ?>

    <?= $form->field($model, 'sbd') ?>

    <?php // echo $form->field($model, 'hinhthuc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
