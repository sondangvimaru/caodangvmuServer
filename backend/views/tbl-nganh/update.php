<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblNganh */

$this->title = 'CẬP NHẬT NGÀNH: ' . $model->manganh;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ NGÀNH', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->manganh, 'url' => ['view', 'id' => $model->manganh]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-nganh-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
