<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblThongbao */

$this->title = 'CẬP NHẬT THÔNG BÁO: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ THÔNG BÁO', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-thongbao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
