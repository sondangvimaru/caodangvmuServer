<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblSinhvien */

$this->title = 'THÊM SINH VIÊN';
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ HỒ SƠ SINH VIÊN', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-sinhvien-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
