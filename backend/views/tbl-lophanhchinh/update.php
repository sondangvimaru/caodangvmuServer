<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblLophanhchinh */

$this->title = 'Cập nhật lớp hành chính: ' . $model->malophanhchinh;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ LỚP HÀNH CHÍNH', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->malophanhchinh, 'url' => ['view', 'id' => $model->malophanhchinh]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-lophanhchinh-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
