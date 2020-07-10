<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TblLichthiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'QUẢN LÝ LỊCH THI';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-lichthi-index">

    <h1 class="text-center text-info"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> THÊM LỊCH THI', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'lichthi_id',
            [
                'attribute'=>'lichthi_id',
                'label' => 'Mã lịch thi',
                
            ],
            [
                'attribute'=>'lophp_id',
                'label' => 'Mã lớp học phần',
                
            ],
            // 'lophp_id',
            'thoigian',
            'diadiem',
            'sbd',
            //'hinhthuc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
