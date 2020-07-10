<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblBaidang */

$this->title = 'CẬP NHẬT BÀI ĐĂNG: ' . $model->baidang_id;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ BÀI ĐĂNG', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->baidang_id, 'url' => ['view', 'id' => $model->baidang_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-baidang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
