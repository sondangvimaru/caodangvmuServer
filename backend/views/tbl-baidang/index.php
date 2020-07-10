<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TblBaidangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'QUẢN LÝ BÀI ĐĂNG';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-baidang-index">

    <h1 class="text-center text-info"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> THÊM BÀI', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'baidang_id',
            'tieude:ntext',
            // 'anh_dai_dien',
            // 'noidung:ntext',
            'thoigiandang',
            //'danhmuc_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
