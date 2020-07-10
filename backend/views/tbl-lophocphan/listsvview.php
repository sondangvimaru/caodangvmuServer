<?php

use common\models\search\TblSinhvienSearch;
use common\models\TblHocphan;
use common\models\TblLophocphan;
use common\models\TblSinhvien;
use yii\helpers\Html;
 
use yii\grid\GridView;

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


<div >
 

<p >
     <h1 style="text-align: center;">Danh sách lớp<?php 
     try
     {

  $lhp= TblLophocphan::findOne(["lophp_id"=>$lophp_id]);
        $hp=TblHocphan::findOne(["mahocphan"=>$lhp->mahocphan]);
        $n;
        (intval($lhp->nhom)<10)?$n="N0":$n="N";
        
        echo" <br>". $hp->tenhocphan." Nhóm: ".$n.$lhp->nhom;
        echo "<br> Mã lớp học phần: {$lophp_id}";
     }catch(Exception $e)
     {

     }
   
     ?></h1>
    <form action=""  method="post" enctype="multipart/form-data">

        <input type="file" name="myfile" value="chọn" ><br>
        <input type="submit" name="upload" value="Nhập Điểm" class="btn btn-danger">
        <?= Html::a('Export điểm',['exportdsl','lophp_id'=>$lophp_id],["class"=>"btn btn-primary"])?>

        <?=  Html::a('Export danh sách lớp',['exportlop','id'=>$lophp_id],["class"=>"btn btn-primary"]);?>
    </form>
</p>


<?= GridView::widget([
    'dataProvider' => $provider,
 
    'columns' => [
        ['class' => 'yii\grid\SerialColumn','header'=>'STT'],
        // 'msv', 
        // 'ten',
        // 'lophanhchinh',
        // 'nganh'

        [
            'attribute'=>'msv',
            'label' => 'Mã Sinh Viên',

        ],
        [
            'attribute'=>'ten',
            'label' => 'Tên Sinh Viên',
        ],
        [
            'attribute'=>'malophanhchinh',
            'label' => 'Lớp Hành Chính',

        ]
        ,
        [

            'class' => 'yii\grid\ActionColumn',
            'header' => 'Chức năng',
            'headerOptions' => ['style' => 'color:#337ab7','class'=>'text-center'],
            'template' => "{view}&nbsp;{update}&nbsp;{delete}",
            'contentOptions'=>['class'=>'text-center'],
            'buttons' => [
                'view' => function ($url,$data,$id) {



                                $view=Html::a('', null, ["href"=>"http://localhost:8000/caodangvmu/backend/web/index.php?r=tbl-lophocphan%2Fxemdiem&msv=".$data["msv"]."&id=".$data["lophp_id"],'name'=>'viewdiem','class' => 'glyphicon glyphicon-eye-open','title'=>'Xem Điểm',]);

                                ?>
                    <script>
                        var vitri= '<?php echo  $id?>'

                    </script>
    <?php
                    return  $view;
                },

                'update' => function ($url,$data,$id) {
                           $edit=Html::a('',null, ["href"=>"http://localhost:8000/caodangvmu/backend/web/index.php?r=tbl-lophocphan%2Feditdiem&msv=".$data["msv"]."&id=".$data["lophp_id"],'name'=>"editdiem",'class' => 'glyphicon glyphicon-pencil','title'=>'Chỉnh sửa điểm']);

    ?>
                <script>
                    var vitri= '<?php echo  $id?>'
                </script>
                <?php
                    return  $edit;
                },
                'delete' => function ($url,$data,$id) {
                      $delete=Html::a(' ', null,["href"=>"http://localhost:8000/caodangvmu/backend/web/index.php?r=tbl-lophocphan%2Fdeletesv&msv=".$data["msv"]."&id=".$data["lophp_id"],"name"=>"deletesv",'class' => 'glyphicon glyphicon-trash','title'=>'Xóa sinh viên khỏi lớp' ]);

                ?>
                <script>
                    var vitri= '<?php echo  $id?>'
                </script>
                <?php
                    return $delete;
                },


            ]
            ],
        ]
//        [
//
//            'contentOptions'=>['class'=>'text-center'],
//            'value'=> function($provider )
//            {
//
//
//                $view=Html::a('', null, ['name'=>'viewdiem','class' => 'glyphicon glyphicon-eye-open','title'=>'Xem Điểm','onclick'=>'onview()',"value"=>$provider["msv"]]);
//
//                $edit=Html::a('', ['haha',"msv"=>"1","id"=>"2"], ['class' => 'glyphicon glyphicon-pencil','title'=>'Chỉnh sửa điểm']);
//                $delete=Html::a(' ', null,["name"=>"deletesv",'class' => 'glyphicon glyphicon-trash','title'=>'Xóa sinh viên khỏi lớp','onclick'=>'ondelete()',"value"=>$provider["msv"]]);
//                return
//
//                    Html::tag('div',$view."  ".$edit."  ".$delete);
//
//            },
//            'format'=>'raw',
//            'filter'=>false
//        ]
       

        
        
   

]);



?>

</div>