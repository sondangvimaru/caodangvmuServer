<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TblGiangvienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'QUẢN LÝ GIẢNG VIÊN';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-giangvien-index">

    <h1 class="text-center text-info"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Thêm giảng viên', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_giangvien',
            'tengiangvien',
            'manganh',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
