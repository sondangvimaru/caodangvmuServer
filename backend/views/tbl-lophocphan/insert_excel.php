<?php


require_once 'Classes/PHPExcel.php';
function import_execel($file)
{

    $objFile = PHPExcel_IOFactory::identify($file);
    $objData = PHPExcel_IOFactory::createReader($objFile);

    //Chỉ đọc dữ liệu


    // Load dữ liệu sang dạng đối tượng
    $objPHPExcel = $objData->load($file);



    //Chọn trang cần truy xuất
    $sheet  = $objPHPExcel->setActiveSheetIndex(0);

    //Lấy ra số dòng cuối cùng
    $Totalrow = $sheet->getHighestRow();
    //Lấy ra tên cột cuối cùng
    $LastColumn = $sheet->getHighestColumn();



    $conn= mysqli_connect("localhost", "root", "", "newcaodang") or die ("could not connect to mysql");




    $lophp=$sheet->getCellByColumnAndRow(0, 1)->getValue();
   $lhp= \common\models\TblLophocphan::findOne(["lophp_id"=>$lophp]);
    for($row=4;$row<=$Totalrow;$row++)
    {
        //
        $msv= $sheet->getCellByColumnAndRow(1, $row)->getValue();
//        $ten= $sheet->getCellByColumnAndRow(2, $row)->getValue();
//        $malophanhchinh= $sheet->getCellByColumnAndRow(3, $row)->getValue();
        $diemx= $sheet->getCellByColumnAndRow(4, $row)->getValue();
        $diemy= $sheet->getCellByColumnAndRow(5, $row)->getValue();
        $diemz= $sheet->getCellByColumnAndRow(6, $row)->getValue();
        $ghichu=$sheet->getCellByColumnAndRow(9, $row)->getValue();


        //them cac truong trong csdl
        $sql ="UPDATE tbl_diem SET diemX='$diemx',diemY='$diemy', diemZ='$diemz', ghichu='$ghichu' WHERE msv='$msv' and  mahocphan='$lhp->mahocphan'" ;


//        $file= fopen("test.txt","w");
//        fwrite($file,$sql);
//        fclose($file);
   if (mysqli_query($conn, $sql)) {
  if($row>=$Totalrow)
  {
      ?>
      <script>


          alert("Nhập Điểm Thành công");
      </script>
<?php
  }
 } else {

 }

    }
    mysqli_close($conn);

}


?>

