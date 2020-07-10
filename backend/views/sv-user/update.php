<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SvUser */

$this->title = 'CẬP NHẬT TÀI KHOẢN SINH VIÊN: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ TÀI KHOẢN SINH VIÊN', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sv-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
