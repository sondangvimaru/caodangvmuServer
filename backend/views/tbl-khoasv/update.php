<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblPhanlhp\TblKhoasv */

$this->title = 'Update Tbl Khoasv: ' . $model->khoa_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Khoasvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->khoa_id, 'url' => ['view', 'id' => $model->khoa_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-khoasv-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
