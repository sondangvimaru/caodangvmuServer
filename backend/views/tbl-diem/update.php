<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblDiem */

$sv= \common\models\TblSinhvien::findOne(["msv"=>$model->msv]);
$this->title = 'Cập nhật điểm: ' . $model->msv." - ".$sv->ten;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ ĐIỂM', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->msv, 'url' => ['view', 'id' => $model->diem_id]];
$this->params['breadcrumbs'][] = 'Update';
$update="update";
?>
<div class="tbl-diem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,"update"=>$update
    ]) ?>

</div>
