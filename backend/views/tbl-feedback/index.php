<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TblFeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Feedbacks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Feedback', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'msv',
            'content:ntext',
            'from_user:boolean',
            'type',
            //'stt',
            //'time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
