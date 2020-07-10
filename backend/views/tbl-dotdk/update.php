<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblDotdk */

$this->title = 'CẬP NHẬT ĐỢT ĐĂNG KÝ HỌC PHẦN: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ ĐỢT ĐĂNG KÝ HỌC PHẦN', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->dotdk_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-dotdk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
