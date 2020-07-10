<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\TblBaidangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-baidang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'baidang_id') ?>

    <?= $form->field($model, 'tieude') ?>

    <?= $form->field($model, 'anh_dai_dien') ?>

    <?= $form->field($model, 'noidung') ?>

    <?= $form->field($model, 'thoigiandang') ?>

    <?php // echo $form->field($model, 'danhmuc_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
