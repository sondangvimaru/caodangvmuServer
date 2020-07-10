<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AdminUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'QUẢN LÝ THÔNG TIN ADMIN';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-user-index">

    <h1 class="text-center text-info"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> THÊM ADMIN', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'admin_id',
            'username',
            'password',
            'status_id',
            'funtions_id',
            //'ten',
            //'gioitinh:boolean',
            //'diachi',
            //'email:email',
            //'sdt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
