<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblDantoc */

$this->title = 'CẬP NHẬT DÂN TỘC: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ DANH MỤC DÂN TỘC', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_dantoc]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-dantoc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
