<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\TblHocphanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-hocphan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mahocphan') ?>

    <?= $form->field($model, 'tenhocphan') ?>

    <?= $form->field($model, 'sotinchi') ?>

    <?= $form->field($model, 'manganh') ?>

    <?= $form->field($model, 'mamontienquyet') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
