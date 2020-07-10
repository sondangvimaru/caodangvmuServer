<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblDotdk */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ ĐỢT ĐĂNG KÝ HỌC PHẦN', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-dotdk-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->dotdk_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->dotdk_id], [
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
            'dotdk_id',
            'name',
//            'status:boolean',
            [
                'label' => 'Trạng Thái',
                'attribute'=>'status',
                'value'=>function($data){
                    /* @var $data \common\models\TblDotdk */
                    if($data->status)
                        return 'Hoạt Động';
                    return 'Kết Thúc';
                },

            ],
        ],
    ]) ?>

</div>
