<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TblNganhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'QUẢN LÝ NGÀNH';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-nganh-index">

    <h1 class="text-center text-info"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> THÊM NGÀNH', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'manganh',
            'tennganh',
//            'makhoa',

            [
                'attribute'=>'makhoa',
                'label' => 'Khoa',

                'value'=>function($data){
                  $khoa=\common\models\TblKhoa::findOne(["makhoa"=>$data->makhoa]);
                  return $khoa->tenkhoa;
                }
                ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
