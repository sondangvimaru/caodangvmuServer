<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblSinhvien */

$this->title = 'CẬP NHẬT THÔNG TIN SINH VIÊN: ' . $model->msv;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ HỒ SƠ SINH VIÊN', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->msv, 'url' => ['view', 'id' => $model->msv]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-sinhvien-update">

    <h1 class="text-center text-info"> <i> <?= Html::encode($this->title) ?></i></h1>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
