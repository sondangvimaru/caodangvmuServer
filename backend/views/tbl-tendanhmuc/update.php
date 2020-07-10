<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblTendanhmuc */

$this->title = 'CẬP NHẬT DANH MỤC: ' . $model->danhmuc_id;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ DANH MỤC', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->danhmuc_id, 'url' => ['view', 'id' => $model->danhmuc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-tendanhmuc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
