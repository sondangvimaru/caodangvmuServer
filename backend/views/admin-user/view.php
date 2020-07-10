<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AdminUser */

$this->title = $model->admin_id;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ THÔNG TIN ADMIN', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="admin-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('CẬP NHẬT', ['update', 'id' => $model->admin_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('XÓA', ['delete', 'id' => $model->admin_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'admin_id',
            'username',
            'password',
            'status_id',
            'funtions_id',
            'ten',
            'gioitinh:boolean',
            'diachi',
            'email:email',
            'sdt',
        ],
    ]) ?>

</div>
