<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TblLophanhchinhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'QUẢN LÝ LỚP HÀNH CHÍNH';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-lophanhchinh-index">

    <h1 class="text-center text-info"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Thêm lớp hành chính', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'malophanhchinh',
            'tenlophc',
            'namvaotruong',
            'namtotnghiep',
            //'manganh',
            [
                'attribute'=>'manganh',
                'label' => 'Ngành',

                'value'=>function($data){
                    $nganh=\common\models\TblNganh::findOne(["manganh"=>$data->manganh]);
                    return $nganh->tennganh;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
