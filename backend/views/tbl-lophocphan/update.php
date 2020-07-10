<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblLophocphan */

$this->title = 'CẬP NHẬT LỚP HỌC PHẦN: ' . $model->lophp_id;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ LỚP HỌC PHẦN', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lophp_id, 'url' => ['view', 'id' => $model->lophp_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-lophocphan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
