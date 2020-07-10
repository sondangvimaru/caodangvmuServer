<?php

use common\models\TblDotdk;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblLophocphan */

$this->title = $model->lophp_id;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ LỚP HỌC PHẦN', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-lophocphan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('CẬP NHẬT', ['update', 'id' => $model->lophp_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('XÓA', ['delete', 'id' => $model->lophp_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa?',
                'method' => 'post',
            ],
        ]) ?>
         <?= Html::a('Danh Sách Lớp', ['showlistsv', 'id' => $model->lophp_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'lophp_id',
            'mahocphan',
            'nhom',
            'thoigianbatdau',
            'thoigianketthuc',
//            'tietbatdau',
//            'tietketthuc',
            'giangvien',
            'diadiem',
//            'thu',
            'dotdk_id'
            // ,[

            //     'attribute'=>'dotdk_id',
            //     'label' => 'Đợt Đăng ký',
            //     'value' => function($data){
               
            //         $dotdk=TblDotdk::findOne(["dotdk_id"=>$data->dotdk_id]);
            //         return $dotdk->name;
            //     },
            // ]
           
            
        ],
    ]) ?>

</div>
