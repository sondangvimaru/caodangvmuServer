<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblKhoa */

$this->title = 'THÊM KHOA';
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ KHOA', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-khoa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
