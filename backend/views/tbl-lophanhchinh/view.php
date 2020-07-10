<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblLophanhchinh */

$this->title = $model->malophanhchinh;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ LỚP HÀNH CHÍNH', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-lophanhchinh-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->malophanhchinh], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->malophanhchinh], [
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
            'malophanhchinh',
            'tenlophc',
            'namvaotruong',
            'namtotnghiep',
            'manganh',
        ],
    ]) ?>

</div>
