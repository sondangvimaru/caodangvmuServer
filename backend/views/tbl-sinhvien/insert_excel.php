<?php

use common\models\API_H17;

require_once 'Classes/PHPExcel.php';

function checkdrawing($row,$objPHPExcel,$ten)
{
    $filename=" ";
    foreach ($objPHPExcel->getActiveSheet()->getDrawingCollection() as $drawing) {

//for XLSX format
        $string = $drawing->getCoordinates();
        $coordinate = PHPExcel_Cell::coordinateFromString($string);
        if ($coordinate[1] == $row) {

            if ($drawing instanceof PHPExcel_Worksheet_Drawing) {
                $zipReader = fopen($drawing->getPath(), 'r');
                $imageContents = '';
                while (!feof($zipReader)) {
                    $imageContents .= fread($zipReader, 1024);
                }
                fclose($zipReader);
                $time = time();
                $filename="{$time}_avata-{$ten}.{$drawing->getExtension()}";
                $file = fopen("../../images/{$filename}", "w");
                fwrite($file, $imageContents);
                fclose($file);
                break;
            }
        }
    }

    return $filename;
}
function import_execel($file)
{

    $objFile = PHPExcel_IOFactory::identify($file);
    $objData = PHPExcel_IOFactory::createReader($objFile);

    //Chỉ đọc dữ liệu


    // Load dữ liệu sang dạng đối tượng
    $objPHPExcel = $objData->load($file);

    //Lấy ra số trang sử dụng phương thức getSheetCount();
    // Lấy Ra tên trang sử dụng getSheetNames();

    //Chọn trang cần truy xuất
    $sheet  = $objPHPExcel->setActiveSheetIndex(0);

    //Lấy ra số dòng cuối cùng
    $Totalrow = $sheet->getHighestRow();
    //Lấy ra tên cột cuối cùng
    $LastColumn = $sheet->getHighestColumn();

    //Chuyển đổi tên cột đó về vị trí thứ, VD: C là 3,D là 4
    $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
    $conn= mysqli_connect("localhost", "root", "", "newcaodang") or die ("could not connect to mysql");
    $arr_drawring=$objPHPExcel->getActiveSheet()->getDrawingCollection();


//    $objData->setReadDataOnly(true);
    for($row=2;$row<=$Totalrow;$row++)
    {
        //
        $ten= $sheet->getCellByColumnAndRow(2, $row)->getValue();

        $ten_file = API_H17::createCode($ten);
    $anh_dai_dien= checkdrawing($row,$objPHPExcel,$ten_file);


        $msv= $sheet->getCellByColumnAndRow(1, $row)->getValue();

                   try {
                $ngaysinh= $sheet->getCellByColumnAndRow(3, $row)->getValue();

            $ngaysinh=date("Y-m-d",mktime(0,0,0,1,$ngaysinh-1,1900));
        }catch (Exception $e)
        {
            $ngaysinh= $sheet->getCellByColumnAndRow(3, $row)->getValue();
        }


        $gioitinh= $sheet->getCellByColumnAndRow(4, $row)->getValue();

        $gioitinh=(strtolower($gioitinh)=="nam")?1:0;

        $diachi= $sheet->getCellByColumnAndRow(5, $row)->getValue();
        $machuyennganh= $sheet->getCellByColumnAndRow(6, $row)->getValue();
        $malophanhchinh= $sheet->getCellByColumnAndRow(7, $row)->getValue();
        $sdt= $sheet->getCellByColumnAndRow(8, $row)->getValue();
        $tongiao= $sheet->getCellByColumnAndRow(9, $row)->getValue();
        $tongiao=(strtolower($tongiao)=="có")?1:0;

        $trinhdohocvan= $sheet->getCellByColumnAndRow(10, $row)->getValue();
        try {
            $ngayketnapdoan= $sheet->getCellByColumnAndRow(11, $row)->getValue();
            $ngayketnapdoan=date("Y-m-d",mktime(0,0,0,1,$ngayketnapdoan-1,1900));
        }catch (Exception $e)
        {
            $ngayketnapdoan= $sheet->getCellByColumnAndRow(11, $row)->getValue();
        }

        $hotenbo= $sheet->getCellByColumnAndRow(12, $row)->getValue();
        $hotenme= $sheet->getCellByColumnAndRow(13, $row)->getValue();

        $nghenghiepbo= $sheet->getCellByColumnAndRow(14, $row)->getValue();
        $nghenghiepme= $sheet->getCellByColumnAndRow(15, $row)->getValue();
        $dttdcs= $sheet->getCellByColumnAndRow(16, $row)->getValue();
        $nghetruockhihoc= $sheet->getCellByColumnAndRow(17, $row)->getValue();
        $noidkthgtru= $sheet->getCellByColumnAndRow(18, $row)->getValue();
        $nvcongviec= $sheet->getCellByColumnAndRow(19, $row)->getValue();
        $dantoc= $sheet->getCellByColumnAndRow(20, $row)->getValue();




        $sql = "SELECT  * FROM tbl_dantoc where name='$dantoc'";
        $file= fopen("test.txt","w");
        fwrite($file,$sql);
        fclose($file);
        $result = $conn->query($sql);

        $array=[];
        if ($result->num_rows > 0) {


            while($rows = $result->fetch_assoc()) {
                $array[] = $rows;
            }
        } else {
            echo "0 results";
        }

        $dantoc=$array[0]["id_dantoc"];

        $quequan= $sheet->getCellByColumnAndRow(21, $row)->getValue();
        $tenthuonggoi= $sheet->getCellByColumnAndRow(22, $row)->getValue();
        $noisinh= $sheet->getCellByColumnAndRow(23, $row)->getValue();

        try {

            $ngaythamgiadcs= $sheet->getCellByColumnAndRow(24, $row)->getValue();
            $ngaythamgiadcs=date("Y-m-d",mktime(0,0,0,1,$ngaythamgiadcs-1,1900));

        }catch (Exception $e)
        {
            $ngaythamgiadcs= null;
        }
        try {
            $ngaychinhthuctgdcs= $sheet->getCellByColumnAndRow(25, $row)->getValue();
            $ngaychinhthuctgdcs=date("Y-m-d",mktime(0,0,0,1,$ngaychinhthuctgdcs-1,1900));
        }catch (Exception $e)
        {
            $ngaychinhthuctgdcs=null;

        }
        $hotenvochong= $sheet->getCellByColumnAndRow(26, $row)->getValue();
        $nghenghiepvochong= $sheet->getCellByColumnAndRow(27, $row)->getValue();



        //them cac truong trong csdl
        $sql = "INSERT INTO tbl_sinhvien (msv,ten,ngaysinh,gioitinh,diachi,manganh,malophanhchinh,sdt,tongiao,trinhdohocvan,ngayketnapdoan,
    hotenbo,hotenme,nghenghiepbo,nghenghiepme,doituongthuocdienchinhsach,nghenghieplamtruockhivaohoc,noidangkythuongtru,nguyenvongvieclam,id_dantoc,quequan,anh_dai_dien,ten_thuong_goi,noi_sinh,ngay_tham_gia_dcsvn,ngay_chinh_thuc_tg_dcsvn,ho_va_ten_vo_chong,nghe_nghiep_vo_chong)
        VALUES('$msv','$ten','$ngaysinh',$gioitinh,'$diachi','$machuyennganh','$malophanhchinh','$sdt','$tongiao',
        '$trinhdohocvan','$ngayketnapdoan','$hotenbo','$hotenme','$nghenghiepbo','$nghenghiepme','$dttdcs','$nghetruockhihoc','$noidkthgtru','$nvcongviec','$dantoc','$quequan','$anh_dai_dien','$tenthuonggoi','$noisinh','$ngaythamgiadcs','$ngaychinhthuctgdcs','$hotenvochong','$nghenghiepvochong')";

        if (mysqli_query($conn, $sql)) {

            $sql_sv_use="INSERT INTO sv_user (msv,password,status) VALUES('$msv','123456a@','1')";

            mysqli_query($conn, $sql_sv_use);
        } else {


        }

//   if (mysqli_query($conn, $sql)) {
//     echo "thanh cong";
// } else {
//     echo "Error: " ;
// }

    }
    mysqli_close($conn);

}


?>
