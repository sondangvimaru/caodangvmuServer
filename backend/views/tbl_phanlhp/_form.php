<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblPhanlhp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-phanlhp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lophp_id')->textInput() ?>

    <?= $form->field($model, 'manganh')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
