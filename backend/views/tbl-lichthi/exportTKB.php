<?php
require_once '../tbl-lophocphan/Classes/PHPExcel.php';


//$arr_ds=\common\models\TblDangkyhocphan::findAll(["lophp_id"=>$id]);

export_excel( );
function export_excel( )
{

    //Khởi tạo đối tượng
    $excel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
    $excel->setActiveSheetIndex(0);

    $excel->getActiveSheet()->setTitle('Thời khóa biểu');
    $excel->getActiveSheet()->setPrintGridlines(TRUE);
//Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(10);

    $excel->getActiveSheet()
        ->getStyle('A:AO')
        ->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



//noi cell
    $excel->getActiveSheet()->mergeCells("C1:E1");
    $excel->getActiveSheet()->mergeCells("C2:E2");
    $excel->getActiveSheet()->mergeCells("F1:P1");
    $excel->getActiveSheet()->mergeCells("F2:P2");
    $excel->getActiveSheet()->mergeCells("F3:P3");
    $excel->getActiveSheet()->mergeCells("B4:G4");
    $excel->getActiveSheet()->mergeCells("H4:J4");
    $excel->getActiveSheet()->mergeCells("A7:A11");
    $excel->getActiveSheet()->mergeCells("A12:A16");

    $excel->getActiveSheet()->mergeCells("C6:D6");
    $excel->getActiveSheet()->mergeCells("C7:D7");
    $excel->getActiveSheet()->mergeCells("C8:D8");
    $excel->getActiveSheet()->mergeCells("C9:D9");
    $excel->getActiveSheet()->mergeCells("C10:D10");
    $excel->getActiveSheet()->mergeCells("C11:D11");
    $excel->getActiveSheet()->mergeCells("C12:D12");
    $excel->getActiveSheet()->mergeCells("C13:D13");
    $excel->getActiveSheet()->mergeCells("C14:D14");
    $excel->getActiveSheet()->mergeCells("C15:D15");
    $excel->getActiveSheet()->mergeCells("C16:D16");

    $excel->getActiveSheet()->mergeCells("E6:F6");
    $excel->getActiveSheet()->mergeCells("E7:F7");
    $excel->getActiveSheet()->mergeCells("E8:F8");
    $excel->getActiveSheet()->mergeCells("E9:F9");
    $excel->getActiveSheet()->mergeCells("E10:F10");
    $excel->getActiveSheet()->mergeCells("E11:F11");
    $excel->getActiveSheet()->mergeCells("E12:F12");
    $excel->getActiveSheet()->mergeCells("E13:F13");
    $excel->getActiveSheet()->mergeCells("E14:F14");
    $excel->getActiveSheet()->mergeCells("E15:F15");
    $excel->getActiveSheet()->mergeCells("E16:F16");

    $excel->getActiveSheet()->mergeCells("G6:H6");
    $excel->getActiveSheet()->mergeCells("G7:H7");
    $excel->getActiveSheet()->mergeCells("G8:H8");
    $excel->getActiveSheet()->mergeCells("G9:H9");
    $excel->getActiveSheet()->mergeCells("G10:H10");
    $excel->getActiveSheet()->mergeCells("G11:H11");
    $excel->getActiveSheet()->mergeCells("G12:H12");
    $excel->getActiveSheet()->mergeCells("G13:H13");
    $excel->getActiveSheet()->mergeCells("G14:H14");
    $excel->getActiveSheet()->mergeCells("G15:H15");
    $excel->getActiveSheet()->mergeCells("G16:H16");

    $excel->getActiveSheet()->mergeCells("I6:J6");
    $excel->getActiveSheet()->mergeCells("I7:J7");
    $excel->getActiveSheet()->mergeCells("I8:J8");
    $excel->getActiveSheet()->mergeCells("I9:J9");
    $excel->getActiveSheet()->mergeCells("I10:J10");
    $excel->getActiveSheet()->mergeCells("I11:J11");
    $excel->getActiveSheet()->mergeCells("I12:J12");
    $excel->getActiveSheet()->mergeCells("I13:J13");
    $excel->getActiveSheet()->mergeCells("I14:J14");
    $excel->getActiveSheet()->mergeCells("I15:J15");
    $excel->getActiveSheet()->mergeCells("I16:J16");

    $excel->getActiveSheet()->mergeCells("K6:L6");
    $excel->getActiveSheet()->mergeCells("K7:L7");
    $excel->getActiveSheet()->mergeCells("K8:L8");
    $excel->getActiveSheet()->mergeCells("K9:L9");
    $excel->getActiveSheet()->mergeCells("K10:L10");
    $excel->getActiveSheet()->mergeCells("K11:L11");
    $excel->getActiveSheet()->mergeCells("K12:L12");
    $excel->getActiveSheet()->mergeCells("K13:L13");
    $excel->getActiveSheet()->mergeCells("K14:L14");
    $excel->getActiveSheet()->mergeCells("K15:L15");
    $excel->getActiveSheet()->mergeCells("K16:L16");

    $excel->getActiveSheet()->mergeCells("M6:N6");
    $excel->getActiveSheet()->mergeCells("M7:N7");
    $excel->getActiveSheet()->mergeCells("M8:N8");
    $excel->getActiveSheet()->mergeCells("M9:N9");
    $excel->getActiveSheet()->mergeCells("M10:N10");
    $excel->getActiveSheet()->mergeCells("M11:N11");
    $excel->getActiveSheet()->mergeCells("M12:N12");
    $excel->getActiveSheet()->mergeCells("M13:N13");
    $excel->getActiveSheet()->mergeCells("M14:N14");
    $excel->getActiveSheet()->mergeCells("M15:N15");
    $excel->getActiveSheet()->mergeCells("M16:N16");

    $excel->getActiveSheet()->mergeCells("O6:P6");
    $excel->getActiveSheet()->mergeCells("O7:P7");
    $excel->getActiveSheet()->mergeCells("O8:P8");
    $excel->getActiveSheet()->mergeCells("O9:P9");
    $excel->getActiveSheet()->mergeCells("O10:P10");
    $excel->getActiveSheet()->mergeCells("O11:P11");
    $excel->getActiveSheet()->mergeCells("O12:P12");
    $excel->getActiveSheet()->mergeCells("O13:P13");
    $excel->getActiveSheet()->mergeCells("O14:P14");
    $excel->getActiveSheet()->mergeCells("O15:P15");
    $excel->getActiveSheet()->mergeCells("O16:P16");


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
    $excel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('6')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('7')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('8')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('9')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('10')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('11')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('12')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('13')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('14')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('15')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('16')->setRowHeight(20);

    $excel->getActiveSheet()->getStyle("A6:P6")->applyFromArray($stylerow);
    $excel->getActiveSheet()->getStyle("A7:P7")->applyFromArray($stylerow);
    $excel->getActiveSheet()->getStyle("A8:P8")->applyFromArray($stylerow);
    $excel->getActiveSheet()->getStyle("A9:P9")->applyFromArray($stylerow);
    $excel->getActiveSheet()->getStyle("A10:P10")->applyFromArray($stylerow);
    $excel->getActiveSheet()->getStyle("A11:P11")->applyFromArray($stylerow);
    $excel->getActiveSheet()->getStyle("A12:P12")->applyFromArray($stylerow);
    $excel->getActiveSheet()->getStyle("A13:P13")->applyFromArray($stylerow);
    $excel->getActiveSheet()->getStyle("A14:P14")->applyFromArray($stylerow);
    $excel->getActiveSheet()->getStyle("A15:P15")->applyFromArray($stylerow);
    $excel->getActiveSheet()->getStyle("A16:P16")->applyFromArray($stylerow);
    $excel->getActiveSheet()->getStyle("C1:E1")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("C2:E2")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("F1:P1")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("B4:G4")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("H4:J4")->applyFromArray($styletr);
    $excel-> getActiveSheet()->getStyle('F1:P1')->getAlignment()->setWrapText(true);

    $excel->getActiveSheet()->setCellValue("C1","ĐẠI HỌC HÀNG HẢI VIỆT NAM");
    $excel->getActiveSheet()->setCellValue("C2","CAO ĐẲNG VMU");
    $excel->getActiveSheet()->setCellValue("B4","HỌ VÀ TÊN:");
    $excel->getActiveSheet()->setCellValue("H4","MSV:");
    $excel->getActiveSheet()->setCellValue("A6","BUỔI");
    $excel->getActiveSheet()->setCellValue("A7","BUỔI SÁNG");
    $excel->getActiveSheet()->setCellValue("A12","BUỔI CHIỀU");
    $excel->getActiveSheet()->setCellValue("B6","TIẾT");
    $excel->getActiveSheet()->setCellValue("B7","Tiết 1");
    $excel->getActiveSheet()->setCellValue("B8","Tiết 2");
    $excel->getActiveSheet()->setCellValue("B9","Tiết 3");
    $excel->getActiveSheet()->setCellValue("B10","Tiết 4");
    $excel->getActiveSheet()->setCellValue("B11","Tiết 5");
    $excel->getActiveSheet()->setCellValue("B12","Tiết 6");
    $excel->getActiveSheet()->setCellValue("B13","Tiết 7");
    $excel->getActiveSheet()->setCellValue("B14","Tiết 8");
    $excel->getActiveSheet()->setCellValue("B15","Tiết 9");
    $excel->getActiveSheet()->setCellValue("B16","Tiết 10");
    $excel->getActiveSheet()->setCellValue("C6","THỨ HAI");
    $excel->getActiveSheet()->setCellValue("E6","THỨ BA");
    $excel->getActiveSheet()->setCellValue("G6","THỨ TƯ");
    $excel->getActiveSheet()->setCellValue("I6","THỨ NĂM");
    $excel->getActiveSheet()->setCellValue("K6","THỨ SÁU");
    $excel->getActiveSheet()->setCellValue("M6","THỨ 7");
    $excel->getActiveSheet()->setCellValue("O6","GHI CHÚ");
    $excel->getActiveSheet()->setCellValue("F1","THỜI KHÓA BIỂU");
    $excel->getActiveSheet()->setCellValue("F2","Học kỳ:….- Năm học 20… - 20...");
    $excel->getActiveSheet()->setCellValue("F3","Thời gian học buổi sáng từ 7:00H (Tiết 1-5);buổi chiều từ 13:00h (Tiết 6-10)(mỗi tiết học 50p)");
    $excel->getActiveSheet()->setCellValue("F4"," Thực hiện từ :....");



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
//    $stt=1;

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