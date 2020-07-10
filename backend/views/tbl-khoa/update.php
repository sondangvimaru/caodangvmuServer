<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblKhoa */

$this->title = 'CẬP NHẬT KHOA: ' . $model->makhoa;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ KHOA', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->makhoa, 'url' => ['view', 'id' => $model->makhoa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-khoa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
