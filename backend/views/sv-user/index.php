<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SvUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'QUẢN LÝ TÀI KHOẢN SINH VIÊN';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sv-user-index">

    <h1 class="text-center text-info" ><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> THÊM TÀI KHOẢN SINH VIÊN', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'msv',
            'password',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
