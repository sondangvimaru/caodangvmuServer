<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\TblSinhvienSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-sinhvien-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'msv') ?>

    <?= $form->field($model, 'ten') ?>

    <?= $form->field($model, 'ngaysinh') ?>

    <?= $form->field($model, 'gioitinh')->checkbox() ?>

    <?= $form->field($model, 'diachi') ?>

    <?php // echo $form->field($model, 'manganh') ?>

    <?php // echo $form->field($model, 'malophanhchinh') ?>

    <?php // echo $form->field($model, 'sdt') ?>

    <?php // echo $form->field($model, 'tongiao')->checkbox() ?>

    <?php // echo $form->field($model, 'trinhdohocvan') ?>

    <?php // echo $form->field($model, 'ngayketnapdoan') ?>

    <?php // echo $form->field($model, 'hotenbo') ?>

    <?php // echo $form->field($model, 'hotenme') ?>

    <?php // echo $form->field($model, 'nghenghiepbo') ?>

    <?php // echo $form->field($model, 'nghenghiepme') ?>

    <?php // echo $form->field($model, 'doituongthuocdienchinhsach') ?>

    <?php // echo $form->field($model, 'nghenghieplamtruockhivaohoc') ?>

    <?php // echo $form->field($model, 'noidangkythuongtru') ?>

    <?php // echo $form->field($model, 'nguyenvongvieclam') ?>

    <?php // echo $form->field($model, 'id_dantoc') ?>

    <?php // echo $form->field($model, 'quequan') ?>

    <?php // echo $form->field($model, 'anh_dai_dien') ?>

    <?php // echo $form->field($model, 'ten_thuong_goi') ?>

    <?php // echo $form->field($model, 'noi_sinh') ?>

    <?php // echo $form->field($model, 'ngay_tham_gia_dcsvn') ?>

    <?php // echo $form->field($model, 'ngay_chinh_thuc_tg_dcsvn') ?>

    <?php // echo $form->field($model, 'ho_va_ten_vo_chong') ?>

    <?php // echo $form->field($model, 'nghe_nghiep_vo_chong') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
