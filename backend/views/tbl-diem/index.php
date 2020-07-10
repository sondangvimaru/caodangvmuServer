<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TblDiemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'QUẢN LÝ ĐIỂM';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-diem-index">

    <h1 class="text-center text-info"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> THÊM ĐIỂM', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'mahocphan',
            [
                'attribute'=>'mahocphan',
                'label' => 'Tên Học Phần',
                'value'=>function($models){

                $hp=\common\models\TblHocphan::findOne(["mahocphan"=>$models->mahocphan]);

                return $hp->tenhocphan;
                }
            ],
            'msv',
//
//            [
//
//                'label' => 'Tên Sinh Viên',
//                'value'=>function($models){
//
//                    $sv=\common\models\TblSinhvien::findOne(["msv"=>$models->msv]);
//
//                    return $sv->ten;
//                },
//                'filter'=>function($models){
//
//                echo $models;
//                exit();
//                }
//            ],
    //            'diem_id',
            'diemX',
            'diemY',
            'diemZ',
            'ghichu:ntext',
      

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
