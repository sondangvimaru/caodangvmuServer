<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblBaidang */

$this->title = $model->baidang_id;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ BÀI ĐĂNG', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-baidang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('CẬP NHẬT', ['update', 'id' => $model->baidang_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('XÓA', ['delete', 'id' => $model->baidang_id], [
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
            'baidang_id',
            'tieude:ntext',
            // 'anh_dai_dien',
            // 'noidung:ntext',
            'thoigiandang',
            'danhmuc_id',
        ],
    ]) ?>

</div>
