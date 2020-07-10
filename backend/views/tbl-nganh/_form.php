<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblNganh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-nganh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'manganh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tennganh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'makhoa')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblKhoa::find()->all(),"makhoa","tenkhoa"),
        'options' => ['placeholder' => 'Khoa'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
