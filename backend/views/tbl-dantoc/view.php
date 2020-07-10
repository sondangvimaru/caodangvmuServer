<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblDantoc */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ DANH MỤC DÂN TỘC', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-dantoc-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('CẬP NHẬT', ['update', 'id' => $model->id_dantoc], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('XÓA', ['delete', 'id' => $model->id_dantoc], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa dân tộc?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_dantoc',
            'name',
        ],
    ]) ?>

</div>
