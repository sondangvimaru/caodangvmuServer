<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TblTendanhmucSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'QUẢN LÝ DANH MỤC';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-tendanhmuc-index">

    <h1 class="text-center text-info" ><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> THÊM DANH MỤC', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'danhmuc_id',
            'tendanhmuc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
