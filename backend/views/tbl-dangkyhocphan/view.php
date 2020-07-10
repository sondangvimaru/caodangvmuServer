<?php

use common\models\TblHocphan;
use common\models\TblLophocphan;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblDangkyhocphan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quản lý đăng ký học phần', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-dangkyhocphan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'thoigiandangky',
            // 'lophp_id',
            [
                'attribute'=>'lophp_id',
                'label'=>"Lớp Học Phần",
                'value'=>function($model)
                {
                    $lhp=TblLophocphan::findOne(["lophp_id",$model->lophp_id]);
                    $hp=TblHocphan::findOne(["mahocphan",$lhp->mahocphan]);
                    $nhom=((intval($lhp->nhom)<10))?"N0":"N";
                    return $hp->tenhocphan." ".$nhom.$lhp->nhom;
                }
            ],
            'msv',
        ],
    ]) ?>

</div>
