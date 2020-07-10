<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblPhanlhp\TblCtdt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-ctdt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nganh')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblNganh::find()->all(),"manganh","tennganh"),
        'options' => ['placeholder' => 'Ngành'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'sonam')->textInput(["type"=>"number", "step"=>"0.1","min"=>"0.0"]) ?>

    <?= $form->field($model, 'khoa_id')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblPhanlhp\TblKhoasv::find()->all(),"khoa_id","khoa_id"),
        'options' => ['placeholder' => 'Khóa'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
