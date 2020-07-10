<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblPhanlhp\TblKhoasv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-khoasv-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'khoa_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
