<?php

use common\models\TblHocphan;
use common\models\TblLophocphan;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblLichthi */

$this->title = $model->lichthi_id;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ LỊCH THI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-lichthi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('CẬP NHẬT', ['update', 'id' => $model->lichthi_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('XÓA', ['delete', 'id' => $model->lichthi_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa lịch thi?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'lichthi_id',
            // 'lophp_id',
            [
                'attribute'=>'lophp_id',
                'label'=>"Lớp Học phần",
                'value'=>function($model)
                {

                    $lhp=TblLophocphan::findOne(["lophp_id",$model->lophp_id]);
                    $hp=TblHocphan::findOne(["mahocphan",$lhp->mahocphan]);
                    $nhom=((intval($lhp->nhom)<10))?"N0":"N";
                    return $hp->tenhocphan." ".$nhom.$lhp->nhom;
                }
            ],
            'thoigian',
            'diadiem',
            'sbd',
            'hinhthuc',
        ],
    ]) ?>

</div>
