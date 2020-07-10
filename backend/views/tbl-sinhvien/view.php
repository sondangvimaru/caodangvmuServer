<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblSinhvien */

$this->title = $model->ten;
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ HỒ SƠ SINH VIÊN', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-sinhvien-view">

    <h1><?= Html::encode(" ") ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->msv], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->msv], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa?',
                'method' => 'post',
            ],
        ]) ?>
        <input type="button" class="btn btn-success" value="Kết Xuất" onclick="kx_click()">
    </p>

    <script>

        function kx_click() {

            var msv='<?php echo $model->msv; ?>';
            window.open("http://localhost:8000/caodangvmu/backend/views/tbl-sinhvien/detail.php?msv="+msv);
        }
    </script>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'msv',
            'ten',
            'ngaysinh',
            'gioitinh:boolean',
            'diachi',
            'manganh',
            'malophanhchinh',
            'sdt',
            'tongiao:boolean',
            'trinhdohocvan',
            'ngayketnapdoan',
            'hotenbo',
            'hotenme',
            'nghenghiepbo',
            'nghenghiepme',
            'doituongthuocdienchinhsach',
            'nghenghieplamtruockhivaohoc',
            'noidangkythuongtru',
            'nguyenvongvieclam',
            'id_dantoc',
            'quequan',
            'anh_dai_dien',
            'ten_thuong_goi',
            'noi_sinh',
            'ngay_tham_gia_dcsvn',
            'ngay_chinh_thuc_tg_dcsvn',
            'ho_va_ten_vo_chong',
            'nghe_nghiep_vo_chong',
        ],
    ]) ?>

</div>
