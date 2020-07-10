<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblLichthi */

$this->title = 'CẬP NHẬT LỊCH THI: ' . $model->lichthi_id;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ LỊCH THI', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lichthi_id, 'url' => ['view', 'id' => $model->lichthi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-lichthi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
