<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TblSinhvienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'QUẢN LÝ HỒ SƠ SINH VIÊN';
$this->params['breadcrumbs'][] = $this->title;
include("insert_excel.php");
if(isset($_POST["upload"])){
    $fileName=$_FILES['myfile']['name'];
    $filetmpname=$_FILES['myfile']['tmp_name'];
    $fileex=pathinfo($fileName,PATHINFO_EXTENSION);
    $allowType=array('xls','xlsx');
    if(!in_array($fileex,$allowType))
    { ?>

        <script>alert("Định dạng không hợp lệ");</script>

        <?php

    }else
    {
        try {

            import_execel($filetmpname);
        }catch (Exception $e)
        {
            ?>
            <script>
                alert("Gặp lỗi khi đang import dữ liệu! Vui lòng kiểm tra lại file đầu vào");
            </script>
            <?php
        }

    }
}
?>
<div class="tbl-sinhvien-index">

    <h1 class="text-center text-info"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> THÊM SINH VIÊN', ['create'], ['class' => 'btn btn-success']) ?>
    <form action=""  method="post" enctype="multipart/form-data">

        <input type="file" name="myfile" value="chọn" ><br>
        <input type="submit" name="upload" value="Import" class="btn btn-danger">
        <input type="button" class="btn btn-success" value="Export" onclick="export_click()">
    </form>
    <br>
    <script>
        function export_click() {
            var c=document.getElementById("btnloc");
            if(c!=null)
            {
                c.click();
            }else
            {
                window.location="http://localhost:8000/caodangvmu/backend/views/tbl-sinhvien/test_export_excel.php";
            }
        }
    </script>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'STT'],
            [
                'attribute'=>'anh_dai_dien',
                'header' => '<a>Ảnh đại diện</a>',

                'value'=>function($data){
                    /* @var $data \common\models\TblSinhvien */
                    return Html::img('../../images/'.$data->anh_dai_dien,['width'=>'80px','height'=>'100px']);
                },
                'format'=>'raw',
                'filter'=>false
            ],
//            [
//                'attribute'=>'msv',
//                'header' => '<a>Mã sinh viên</a>',
//
//                'value'=>function($data){
//                    /* @var $data \common\models\TblSinhvien */
//                    return $data->msv;
//                },
//                'headerOptions'=>['class'=>'text-center'],
//                'contentOptions'=>['class'=>'text-center'],
//                'format'=>'raw',
//                'filter'=>Html::activeTextInput($searchModel,'msv',['class'=>'form-control','type'=>'text'])
//            ],
            'msv',
            'ten',
            'ngaysinh',
            'diachi',

            [
                'attribute'=>'gioitinh',
                'label' => 'Giới tính',

                'value'=>function($data){
                    /* @var $data \common\models\TblSinhvien */
                    if($data->gioitinh)
                        return 'Nam';
                    else
                        return'Nữ';
                },
                'format'=>'raw',
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions'=>['class'=>'text-center'],
                'filter'=>Html::activeDropDownList($searchModel,'gioitinh',[
                    1=>'Nam',
                    0=>'Nữ'
                ],['prompt'=>'Tất cả','class'=>'form-control'])
            ],
            //'manganh',
            'malophanhchinh',
            //'sdt',
            //'tongiao:boolean',
            //'trinhdohocvan',
            //'ngayketnapdoan',
            //'hotenbo',
            //'hotenme',
            //'nghenghiepbo',
            //'nghenghiepme',
            //'doituongthuocdienchinhsach',
            //'nghenghieplamtruockhivaohoc',
            //'noidangkythuongtru',
            //'nguyenvongvieclam',
            //'id_dantoc',
            //'quequan',
            //'anh_dai_dien',
            //'ten_thuong_goi',
            //'noi_sinh',
            //'ngay_tham_gia_dcsvn',
            //'ngay_chinh_thuc_tg_dcsvn',
            //'ho_va_ten_vo_chong',
            //'nghe_nghiep_vo_chong',

            [
                
                

                'value'=>function($data){
                     
                    return Html::a('Xem điểm',['xemdiem','msv'=>$data->msv],['class'=>'btn btn-primary']);
                },
                'format'=>'raw',
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions'=>['class'=>'text-center'],
               
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
 