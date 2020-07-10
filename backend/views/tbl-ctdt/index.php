<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TblCtdtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Ctdts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-ctdt-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Ctdt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nganh',
            'sonam',
            'khoa_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
