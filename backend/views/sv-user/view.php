<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SvUser */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ TÀI KHOẢN SINH VIÊN', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sv-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('CẬP NHẬT ', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('XÓA', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa tài khoản sinh viên?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'msv',
            'password',
            'status',
        ],
    ]) ?>

</div>
