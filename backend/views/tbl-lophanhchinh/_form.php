    <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblLophanhchinh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-lophanhchinh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'malophanhchinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenlophc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'namvaotruong')->textInput() ?>

    <?= $form->field($model, 'namtotnghiep')->textInput() ?>

    <?= $form->field($model, 'manganh')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblNganh::find()->all(),"manganh","tennganh"),
        'options' => ['placeholder' => 'Ngành'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
