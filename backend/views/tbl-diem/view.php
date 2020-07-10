<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblDiem */

$this->title = $model->msv;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ ĐIỂM', 'url' => ['index']];
$this->params['breadcrumbs'][] =$model->msv;
\yii\web\YiiAsset::register($this);
$sv=\common\models\TblSinhvien::findOne(["msv"=>$model->msv]);
?>
<div class="tbl-diem-view">

    <h1><?= Html::encode($sv->ten) ?></h1>

    <p>
        <?= Html::a('CẬP NHẬT', ['update', 'id' => $model->diem_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('XÓA', ['delete', 'id' => $model->diem_id], [
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
//            'diem_id',
            'diemX',
            'diemY',
            'diemZ',
            'ghichu:ntext',
//            'mahocphan',
            [
                'attribute'=>'mahocphan',
                'label' => ' Học Phần',
                'value'=>function($model)
                {
                    $hp=\common\models\TblHocphan::findOne(["mahocphan"=>$model->mahocphan]);
                    return $hp->tenhocphan;
                }

            ],
            [

                'label' => 'Điểm chữ',
                'value'=>function($model)
                {
                    $diemz=$model->diemZ;
                    if($diemz==null) return " ";
                    if($diemz>=9) return "A";
                    if($diemz>=7) return "B";
                    if($diemz>=5.5)return "C";
                    if($diemz>=4) return "D";
                    return "F";
                }

            ],
            [

                'label' => 'Thang Điểm 4',
                'value'=>function($model)
                {
                    $diemz=$model->diemZ;
                    if($diemz==null) return " ";
                    if($diemz>=9) return "4";
                    if($diemz>=7) return "3";
                    if($diemz>=5.5)return "2";
                    if($diemz>=4) return "1";
                    return "0";

                }

            ],
            [
                'attribute'=>'dotdk_id',
                'label' => ' Đợt Đăng Ký',
                'value'=>function($model)
                {
                    $ddk=\common\models\TblDotdk::findOne(["dotdk_id"=>$model->dotdk_id]);
                    return $ddk->name;
                }

            ],

//            'msv',
        ],
    ]) ?>

</div>
