<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\AdminUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'admin_id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'status_id') ?>

    <?= $form->field($model, 'funtions_id') ?>

    <?php // echo $form->field($model, 'ten') ?>

    <?php // echo $form->field($model, 'gioitinh')->checkbox() ?>

    <?php // echo $form->field($model, 'diachi') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'sdt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
