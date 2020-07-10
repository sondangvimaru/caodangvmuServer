<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\TblLophocphanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-lophocphan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lophp_id') ?>

    <?= $form->field($model, 'mahocphan') ?>

    <?= $form->field($model, 'nhom') ?>

    <?= $form->field($model, 'thoigianbatdau') ?>

    <?= $form->field($model, 'thoigianketthuc') ?>

    <?php // echo $form->field($model, 'tietbatdau') ?>

    <?php // echo $form->field($model, 'tietketthuc') ?>

    <?php // echo $form->field($model, 'giangvien') ?>

    <?php // echo $form->field($model, 'diadiem') ?>

    <?php // echo $form->field($model, 'thu') ?>

    <?php // echo $form->field($model, 'dotdk_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
