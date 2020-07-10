<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblHocphan */

$this->title = 'Cập nhật học phần: ' . $model->mahocphan;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ HỌC PHẦN', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mahocphan, 'url' => ['view', 'id' => $model->mahocphan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-hocphan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
