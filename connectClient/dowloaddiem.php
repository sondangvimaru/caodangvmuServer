<?php
require_once '../backend/views/tbl-lophocphan/Classes/PHPExcel.php';


if (isset($_GET['msv'])) {
    $msv = $_GET['msv'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "newcaodang";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT tbl_diem.msv,tbl_sinhvien.ten,tbl_hocphan.tenhocphan,tbl_diem.diemX,tbl_diem.diemY,tbl_diem.diemZ,
 CASE WHEN tbl_diem.diemZ>=9 THEN 'A' WHEN tbl_diem.diemZ>=7 THEN 'B'WHEN tbl_diem.diemZ>=5.5 THEN 'C' WHEN tbl_diem.diemZ>=4
  THEN 'D' ELSE 'F'END as diemchu ,CASE WHEN tbl_diem.diemZ>=9 THEN '4' WHEN tbl_diem.diemZ>=7 THEN '3' WHEN tbl_diem.diemZ>=5.5 
  THEN '2' WHEN tbl_diem.diemZ>=4 THEN '1' ELSE '0' END as diemso,tbl_diem.ghichu FROM tbl_diem,tbl_sinhvien,tbl_hocphan
 WHERE tbl_diem.msv=tbl_sinhvien.msv AND tbl_diem.mahocphan=tbl_hocphan.mahocphan AND tbl_sinhvien.msv='$msv'";
    $arr = array();

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
    }
    export_excel($arr);
}



function export_excel($data )
{

    //Khởi tạo đối tượng
    $excel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
    $excel->setActiveSheetIndex(0);

    $excel->getActiveSheet()->setTitle('Bảng điểm');
    $excel->getActiveSheet()->setPrintGridlines(TRUE);
//Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);


    $excel->getActiveSheet()
        ->getStyle('A:AO')
        ->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



//noi cell
    $excel->getActiveSheet()->mergeCells("A1:C1");
    $excel->getActiveSheet()->mergeCells("A2:C2");
    $excel->getActiveSheet()->mergeCells("D1:H1");
    $excel->getActiveSheet()->mergeCells("D2:G2");
    $excel->getActiveSheet()->mergeCells("A4:B4");







//    $excel->getActiveSheet()->mergeCells("C6:D6");
//    $excel->getActiveSheet()->mergeCells("C7:D7");
//    $excel->getActiveSheet()->mergeCells("C6:C7");
    //  for($i=4;$i<=20;$i++)
    // {
    //     $excel->getActiveSheet()->mergeCellsByColumnAndRow($i,6,$i,7);
    // }
//
//    $excel->getActiveSheet()->mergeCells("U6:U7");
//    $excel->getActiveSheet()->mergeCells("E5:G5");

    $htmlHelper = new \PHPExcel_Helper_HTML();
    $title = '<font face = "Times New Roman" size = "10"> ĐẠI HỌC HÀNG HẢI VIỆT NAM</font> <br>'.'<font face = "Times New Roman" size = "10"><b> TRƯỜNG CAO ĐẲNG VIMARU</b></font>';
    $rich_text = $htmlHelper->toRichTextObject('<?xml encoding="UTF-8">' .$title);


    $styletr = array(
        'font'  => array(
            'bold'=>true,
            'size'  => 11,

            'name'  => 'Time New Roman'
        ));
    $styletd = array(
        'font'  => array(
            'bold'=>true,
            'size'  => 10,

            'name'  => 'Time New Roman'
        ),'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '202020')
            )
        )
    );

    $stylettdnb = array(
        'font'  => array(

            'size'  => 11,

            'name'  => 'Time New Roman'
        ),

    );
    $styletmau = array(
        'font'  => array(
            'bold'=>true,
            'size'  => 10,
            'color' => array('rgb' => '3A0080'),
            'name'  => 'Time New Roman'
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '202020')
            )
        )
    );
    $stylerow = array(
        'font'  => array(

            'size'  => 11,

            'name'  => 'Time New Roman'
        ),'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '202020')
            )
        )
    );
    $styletstt= array(
        'font'  => array(

            'size'  => 11,
            'color' => array('rgb' => '3A0080'),
            'name'  => 'Time New Roman'
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '202020')
            )
        )
    );

    $excel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
    $excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
    $excel->getActiveSheet()->getStyle("A4:H4")->applyFromArray($stylerow);
    $excel->getActiveSheet()->getStyle("A5:H5")->applyFromArray($stylerow);
    $excel->getActiveSheet()->getStyle("A6:H6")->applyFromArray($stylerow);


    $excel->getActiveSheet()->getStyle("A1:C1")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("A2:C2")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("D1:H1")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("D2:G2")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("H2")->applyFromArray($styletr);
    $excel-> getActiveSheet()->getStyle('D1:H1')->getAlignment()->setWrapText(true);

    $excel->getActiveSheet()->setCellValue("A1","ĐẠI HỌC HÀNG HẢI VIỆT NAM");
    $excel->getActiveSheet()->setCellValue("A2","CAO ĐẲNG VMU");
    $excel->getActiveSheet()->setCellValue("A4","TÊN HỌC PHẦN");
    $excel->getActiveSheet()->setCellValue("C4","ĐIỂM X");
    $excel->getActiveSheet()->setCellValue("D4","ĐIỂM Y ");
    $excel->getActiveSheet()->setCellValue("E4","ĐIỂM Z");
    $excel->getActiveSheet()->setCellValue("F4","ĐIỂM CHỮ");
    $excel->getActiveSheet()->setCellValue("G4","ĐIỂM SỐ ");
    $excel->getActiveSheet()->setCellValue("H4","GHI CHÚ");
    $excel->getActiveSheet()->setCellValue("D1","BẢNG ĐIỂM");
    $excel->getActiveSheet()->setCellValue("D2","HỌ VÀ TÊN: ".$data[0]["ten"]);
    $excel->getActiveSheet()->setCellValue("H2","MSV: ".$data[0]["msv"]);


//    $excel->getActiveSheet()->getStyle("A1:C1")->applyFromArray($stylehd);
//    $excel->getActiveSheet()->getStyle("A5:J5")->applyFromArray($styletcol);
//    $excel->getActiveSheet()->getStyle("A6:J6")->applyFromArray($styletcol);
//    $excel-> getActiveSheet()->getStyle('A1:C1')->getAlignment()->setWrapText(true);
//    $excel->getActiveSheet()->setCellValue("A1", $rich_text);
//    $excel->getActiveSheet()->getStyle("A2:L2")->applyFromArray($styletd);
//    $excel->getActiveSheet()->getStyle("A3:L3")->applyFromArray($styletd);
//    $excel-> getActiveSheet()->getStyle('A2:L2')->getAlignment()->setWrapText(true);
//    $excel-> getActiveSheet()->getStyle('A5:L5')->getAlignment()->setWrapText(true);
//    $excel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
//    $excel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
//    $excel->getActiveSheet()->getRowDimension('6')->setRowHeight(40);
//    $lhp= \common\models\TblLophocphan::findOne(["lophp_id"=>$lophp_id]);
//    $hp=\common\models\TblHocphan::findOne(["mahocphan"=>$lhp->mahocphan]);
//    $dkhp= \common\models\TblDangkyhocphan::findOne(["lophp_id"=>$lophp_id]);
//
//
//    $arr_dk=explode("-",$dkhp->thoigiandangky);
//
//    $excel->getActiveSheet()->setCellValue("A2", "DANH SÁCH ĐIỂM THI KẾT THÚC HỌC PHẦN\n NĂM HỌC: ".(intval($arr_dk[0])-1)."-".$arr_dk[0]);
//    (intval($lhp->nhom)<10)?$n="N0":$n="N";
//    $excel->getActiveSheet()->setCellValue("A3","Môn: ".$hp->tenhocphan ."  Nhóm: ".$n.$lhp->nhom);
//    $excel->getActiveSheet()->setCellValue("A5", "STT");
//    $excel->getActiveSheet()->setCellValue("B5", "Ma SV");
//    $excel->getActiveSheet()->setCellValue("C5", "Họ và tên");
//    $excel->getActiveSheet()->setCellValue("D5", "Lớp");
//
//    $excel->getActiveSheet()->setCellValue("E5", "Điểm Thi");
//    $excel->getActiveSheet()->setCellValue("H5", "Thang \nĐiểm \nChữ");
//    $excel->getActiveSheet()->setCellValue("I5", "Thang\n Điểm\n 4");
//    $excel->getActiveSheet()->getStyle("J5")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//    $excel->getActiveSheet()->setCellValue("j5", "Ghi chú");
//    $excel->getActiveSheet()->setCellValue("E6", "X");
//    $excel->getActiveSheet()->setCellValue("F6", "Y");
//    $excel->getActiveSheet()->setCellValue("G6", "Z");
  $sum=5;


foreach ($data as $diem)
{
    $excel->getActiveSheet()->mergeCells("A".$sum.":"."B".$sum);
  $excel->getActiveSheet()->setCellValue("A".$sum,$diem["tenhocphan"]);
    $excel->getActiveSheet()->setCellValue("C".$sum,$diem["diemX"]);
    $excel->getActiveSheet()->setCellValue("D".$sum,$diem["diemY"]);
    $excel->getActiveSheet()->setCellValue("E".$sum,$diem["diemZ"]);
    $excel->getActiveSheet()->setCellValue("F".$sum,$diem["diemchu"]);
    $excel->getActiveSheet()->setCellValue("G".$sum,$diem["diemso"]);
    $excel->getActiveSheet()->setCellValue("H".$sum,$diem["ghichu"]);

    $sum++;
}


    $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    ob_end_clean();
    header('Content-type: application/vnd.ms-excel');
    $milliseconds = round(microtime(true) * 1000);

    header('Content-Disposition: attachment; filename="danhsachlop'.$milliseconds.'.xlsx"');

    ob_start();
    $objWriter->save('php://output');
    $content = ob_get_contents();
    ob_end_clean();
    die($content);
}


?>