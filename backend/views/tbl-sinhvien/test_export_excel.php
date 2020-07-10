<?php

use common\models\search\TblSinhvienSearch;

require_once 'Classes/PHPExcel.php';

//echo "<pre>";
//print_r($a);
//echo "</pre>";

if(isset($_GET["msv"]))
{
    $msv=$_GET["msv"];
    $name=$_GET["name"];
    $ngaysinh=$_GET["ngaysinh"];
    $gioitinh=$_GET["gioitinh"];
    $diachi=$_GET["diachi"];
    $lhc=$_GET["lhc"];
    $sql ="SELECT * FROM tbl_sinhvien";
    if($msv!="null")
    {
        $sql=$sql." WHERE msv LIKE "."'%".$msv."%'";

    }
    if($name!="null" &&!strpos($sql,"WHERE"))
    {
        $sql=$sql." WHERE ten LIKE "."'%".$name."%'";

    }else  if($name!="null" && strpos($sql,"WHERE"))
    {
        $sql=$sql." AND ten LIKE "."'%".$name."%'";
    }
    if($ngaysinh!="null" &&!strpos($sql,"WHERE"))
    {
        $sql=$sql." WHERE ngaysinh LIKE "."'%".$ngaysinh."%'";

    }else  if($ngaysinh!="null" && strpos($sql,"WHERE"))
    {
        $sql=$sql." AND ngaysinh LIKE "."'%".$ngaysinh."%'";
    }
    if($gioitinh!="null" &&!strpos($sql,"WHERE"))
    {
        $sql=$sql." WHERE gioitinh = ".$gioitinh;

    }else  if($gioitinh!="null" && strpos($sql,"WHERE"))
    {
        $sql=$sql." AND gioitinh = ".$gioitinh;
    }
    if($diachi!="null" &&!strpos($sql,"WHERE"))
    {
        $sql=$sql." WHERE diachi LIKE "."'%".$diachi."%'";

    }else  if($diachi!="null" && strpos($sql,"WHERE"))
    {
        $sql=$sql." AND diachi LIKE "."'%".$diachi."%'";
    }
    if($lhc!="null" &&!strpos($sql,"WHERE"))
    {
        $sql=$sql." WHERE malophanhchinh LIKE "."'%".$lhc."%'";

    }else  if($lhc!="null" && strpos($sql,"WHERE"))
    {
        $sql=$sql." AND malophanhchinh LIKE "."'%".$lhc."%'";
    }
    $conn= mysqli_connect("localhost", "root", "", "newcaodang") or die ("could not connect to mysql"); //thay testexcel thanh caodangvmu

    $result = $conn->query($sql);

    $array=[];
    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            $array[] = $row;
        }
    } else {
        echo "0 results";
    }

    export_excel($array);
    mysqli_close($conn);
}else
{
    $conn= mysqli_connect("localhost", "root", "", "newcaodang") or die ("could not connect to mysql"); //thay testexcel thanh caodangvmu


    $sqlv = "SELECT * FROM tbl_sinhvien";
    $result = $conn->query($sqlv);

    $array=[];
    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            $array[] = $row;
        }
    } else {
        echo "0 results";
    }

    export_excel($array);
    mysqli_close($conn);
}





function export_excel($data)
{

    //Khởi tạo đối tượng
    $excel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
    $excel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
    $excel->getActiveSheet()->setTitle('danh sách sinh viên');
    $excel->getActiveSheet()->setPrintGridlines(TRUE);
//Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(27);
    $excel->getActiveSheet()->getColumnDimension('R')->setWidth(33);
    $excel->getActiveSheet()->getColumnDimension('S')->setWidth(35);
    $excel->getActiveSheet()->getColumnDimension('T')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('U')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('V')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('X')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('Y')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('Z')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AA')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('AB')->setWidth(20);
    $excel->getActiveSheet()
        ->getStyle('A:AB')
        ->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(60);
//Xét in đậm cho khoảng cột
    $excel->getActiveSheet()->getStyle('B1:D1')->getFont()->setBold(true);
    $excel->getActiveSheet()->getStyle('B1:D1')->getFont()->setSize(30);
    $excel->getActiveSheet()->getStyle('B2:D2')->getFont()->setSize(25);
    $excel->getActiveSheet()->getStyle('A12:AB12')->getFont()->setBold(true);
    $excel->getActiveSheet()->getStyle('D10:H10')->getFont()->setBold(true);
    $excel->getActiveSheet()->getStyle('D10:H10')->getFont()->setSize(25);

//

    $excel->getActiveSheet()->setCellValue('D1', 'Đại Học Hàng Hải Việt Nam');

    $excel->getActiveSheet()->setCellValue('D2', 'Cao đẳng vimaru');
    $excel->getActiveSheet()->setCellValue('D10', 'Danh Sách Sinh Viên');
    $objDrawing = new PHPExcel_Worksheet_Drawing();

    $objDrawing->setPath('../../../images/vmu.png');
    $objDrawing->setCoordinates('D4');
//setOffsetX works properly
    $objDrawing->setOffsetX(-5);
    $objDrawing->setOffsetY(5);
//set width, height
    $objDrawing->setWidth(100);
    $objDrawing->setHeight(100);
    $objDrawing->setWorksheet($excel->getActiveSheet());
    $excel->getActiveSheet()->setCellValue('A12', 'Ảnh đại diện');
    $excel->getActiveSheet()->setCellValue('B12', 'Mã Sinh Viên');
    $excel->getActiveSheet()->setCellValue('C12', 'Họ Tên');
    $excel->getActiveSheet()->setCellValue('D12', 'Ngày sinh');
    $excel->getActiveSheet()->setCellValue('E12', 'Giới tính');
    $excel->getActiveSheet()->setCellValue('F12', 'Địa chỉ');
    $excel->getActiveSheet()->setCellValue('G12', 'Ngành');
    $excel->getActiveSheet()->setCellValue('H12', 'Lớp Hành Chính');
    $excel->getActiveSheet()->setCellValue('I12', 'Số Điện Thoại');
    $excel->getActiveSheet()->setCellValue('J12', 'Tôn giáo');
    $excel->getActiveSheet()->setCellValue('K12', 'Trình Độ Học Vấn');
    $excel->getActiveSheet()->setCellValue('L12', 'Ngày Kết Nạp Đoàn');
    $excel->getActiveSheet()->setCellValue('M12', 'Họ Tên Bố');
    $excel->getActiveSheet()->setCellValue('N12', 'Họ Tên Mẹ');
    $excel->getActiveSheet()->setCellValue('O12', 'Nghề Nghiệp Bố');
    $excel->getActiveSheet()->setCellValue('P12', 'Nghề Nghiệp Mẹ');
    $excel->getActiveSheet()->setCellValue('Q12', 'Đối Tượng Thuộc Diện Chính Sách');
    $excel->getActiveSheet()->setCellValue('R12', 'Nghề Nghiệp Làm Trước Khi Vào Học');
    $excel->getActiveSheet()->setCellValue('S12', 'Nơi Đăng Ký Thường Trú');
    $excel->getActiveSheet()->setCellValue('T12', 'Nguyện Vọng Việc Làm');
    $excel->getActiveSheet()->setCellValue('U12', 'Dân tộc');
    $excel->getActiveSheet()->setCellValue('V12', 'Quê quán');
    $excel->getActiveSheet()->setCellValue('W12', 'Tên thường gọi');
    $excel->getActiveSheet()->setCellValue('X12', 'Nơi sinh');
    $excel->getActiveSheet()->setCellValue('Y12', 'Ngày tham gia ĐCSVN');
    $excel->getActiveSheet()->setCellValue('Z12', 'Ngày chính thức tham gia ĐCSVN');
    $excel->getActiveSheet()->setCellValue('AA12', 'Họ và tên vợ chồng');
    $excel->getActiveSheet()->setCellValue('AB12', 'Nghề nghiệp vợ chồng');
    $numRow = 13;
    $row_hd_style = array(
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '00FFFF')
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('rgb' => '202020')
        )
    )
);
    $row_nm_style = array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'FFCCFF')
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '202020')
            )
        )
    );

    $excel->getActiveSheet()->getStyle("A12:AB12")->applyFromArray($row_hd_style);
    foreach($data as $row){
        $objDrawing = new PHPExcel_Worksheet_Drawing();

        $objDrawing->setPath('../../../images/'. $row["anh_dai_dien"]);
        $objDrawing->setCoordinates('A'.$numRow);
//setOffsetX works properly
//        $objDrawing->setOffsetX(-5);
//        $objDrawing->setOffsetY(5);
        $objDrawing->setWidth(100);
        $objDrawing->setHeight(80);
        $objDrawing->setWorksheet($excel->getActiveSheet());
        $excel->getActiveSheet()->setCellValue('B'.$numRow, $row["msv"]);
        $excel->getActiveSheet()->setCellValue('C'.$numRow, $row["ten"]);
        $excel->getActiveSheet()->setCellValue('D'.$numRow, $row["ngaysinh"]);
        $gt=($row["gioitinh"]==1)?"Nam":"Nữ";

        $excel->getActiveSheet()->setCellValue('E'.$numRow, $gt);
        $excel->getActiveSheet()->setCellValue('F'.$numRow, $row["diachi"]);
        $excel->getActiveSheet()->setCellValue('G'.$numRow, $row["manganh"]);
        $excel->getActiveSheet()->setCellValue('H'.$numRow, $row["malophanhchinh"]);
        $excel->getActiveSheet()->setCellValue('I'.$numRow, $row["sdt"]);
        $tg=($row["tongiao"]==1)?"Có":"Không Có";
        $excel->getActiveSheet()->setCellValue('J'.$numRow, $tg);

        $excel->getActiveSheet()->setCellValue('K'.$numRow, $row["trinhdohocvan"]);
        $excel->getActiveSheet()->setCellValue('L'.$numRow, $row["ngayketnapdoan"]);
        $excel->getActiveSheet()->setCellValue('M'.$numRow, $row["hotenbo"]);
        $excel->getActiveSheet()->setCellValue('N'.$numRow, $row["hotenme"]);
        $excel->getActiveSheet()->setCellValue('O'.$numRow, $row["nghenghiepbo"]);
        $excel->getActiveSheet()->setCellValue('P'.$numRow, $row["nghenghiepme"]);
        $excel->getActiveSheet()->setCellValue('Q'.$numRow, $row["doituongthuocdienchinhsach"]);
        $excel->getActiveSheet()->setCellValue('R'.$numRow, $row["nghenghieplamtruockhivaohoc"]);
        $excel->getActiveSheet()->setCellValue('S'.$numRow, $row["noidangkythuongtru"]);
        $excel->getActiveSheet()->setCellValue('T'.$numRow, $row["nguyenvongvieclam"]);
        $conn= mysqli_connect("localhost", "root", "", "newcaodang") or die ("could not connect to mysql"); //thay testexcel thanh caodangvmu


        $sql = "SELECT * FROM tbl_dantoc where ".$row['id_dantoc'];
        $result = $conn->query($sql);

        $array=[];
        if ($result->num_rows > 0) {

            while($rows = $result->fetch_assoc()) {
                $array[] = $rows;
            }
        } else {
            echo "0 results";
        }

       $excel->getActiveSheet()->setCellValue('U'.$numRow,$array[0]["name"] );
        $excel->getActiveSheet()->setCellValue('V'.$numRow, $row["quequan"]);
        $excel->getActiveSheet()->setCellValue('W'.$numRow, $row["ten_thuong_goi"]);
        $excel->getActiveSheet()->setCellValue('X'.$numRow, $row["noi_sinh"]);
        $excel->getActiveSheet()->setCellValue('Y'.$numRow, $row["ngay_tham_gia_dcsvn"]);
        $excel->getActiveSheet()->setCellValue('Z'.$numRow, $row["ngay_chinh_thuc_tg_dcsvn"]);
        $excel->getActiveSheet()->setCellValue('AA'.$numRow, $row["ho_va_ten_vo_chong"]);
        $excel->getActiveSheet()->setCellValue('AB'.$numRow, $row["nghe_nghiep_vo_chong"]);
        $excel->getActiveSheet()->getStyle("A".$numRow.":AB".$numRow)->applyFromArray($row_nm_style);
      $numRow++;
    }
    $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    ob_end_clean();
    header('Content-type: application/vnd.ms-excel');
    $milliseconds = round(microtime(true) * 1000);
    header('Content-Disposition: attachment; filename="danhsachsinhvien'.$milliseconds.'.xlsx"');

    ob_start();
    $objWriter->save('php://output');
    $content = ob_get_contents();
    ob_end_clean();
    die($content);
}



?>