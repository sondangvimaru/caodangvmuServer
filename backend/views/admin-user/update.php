<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdminUser */

$this->title = 'CẬP NHẬT THÔNG TIN ADMIN: ' . $model->admin_id;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ THÔNG TIN ADMIN', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->admin_id, 'url' => ['view', 'id' => $model->admin_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admin-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
