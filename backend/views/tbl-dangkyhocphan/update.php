<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblDangkyhocphan */

$this->title = 'Cập nhật đăng ký học phần: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quản lý đăng ký học phần', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-dangkyhocphan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
