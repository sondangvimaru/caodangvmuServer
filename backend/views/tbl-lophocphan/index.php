<?php

use common\models\TblHocphan;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TblLophocphanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'QUẢN LÝ LỚP HỌC PHẦN';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-lophocphan-index">

    <h1 class="text-center text-info"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> THÊM LỚP HỌC PHẦN', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'lophp_id',
            // 'mahocphan',
            [
                'attribute'=>'mahocphan',
            'label' => 'Học Phần',
            'value'=>function($data){
               
                $hp=TblHocphan::findOne(["mahocphan"=>$data->mahocphan]);
                return $hp->tenhocphan;
            }],
            'nhom',
//            'thoigianbatdau',
//            'thoigianketthuc',
            [
                'attribute'=>'thoigianbatdau',
                'label' => 'Thời Gian Bắt Đầu',
                'value'=>function($data)
                {
                    return date("d-m-yy",strtotime($data->thoigianbatdau));
                }
                ],
            [
                'attribute'=>'thoigianketthuc',
                'label' => 'Thời Gian Kết Thúc',
                'value'=>function($data)
                {
                    return date("d-m-yy",strtotime($data->thoigianketthuc));
                }
            ],
            //'tietbatdau',
            //'tietketthuc',
            //'giangvien',
            //'diadiem',
            //'thu',
            //'dotdk_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
