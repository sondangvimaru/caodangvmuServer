<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Funtions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="funtions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'funtions_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
