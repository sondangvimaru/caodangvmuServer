<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TblDotdkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'QUẢN LÝ ĐỢT ĐĂNG KÝ HỌC PHẦN';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-dotdk-index">

    <h1 class="text-center text-info"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(' <i class="glyphicon glyphicon-plus"></i> THÊM ĐỢT ĐĂNG KÝ HỌC PHẦN', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
                'format'=>'raw',
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions'=>['class'=>'text-center'],
                'filter'=>Html::activeDropDownList($searchModel,'status',[
                    1=>'Hoạt Động',
                    0=>'Kết Thúc'
                ],['prompt'=>'Tất cả','class'=>'form-control'])
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
