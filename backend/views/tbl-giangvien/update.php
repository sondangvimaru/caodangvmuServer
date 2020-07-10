<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblGiangvien */

$this->title = 'Cập nhật giảng viên: ' . $model->id_giangvien;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ GIẢNG VIÊN', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_giangvien, 'url' => ['view', 'id' => $model->id_giangvien]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-giangvien-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
