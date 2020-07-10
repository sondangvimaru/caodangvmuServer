<?php
require_once 'Classes/PHPExcel.php';


$arr_ds=\common\models\TblDangkyhocphan::findAll(["lophp_id"=>$id]);
$data=array();
foreach ($arr_ds as $dk)
{
    $sv=\common\models\TblSinhvien::findOne(["msv"=>$dk->msv]);
    $data[]=array(
      "msv"=>$sv->msv,
      "ten"=>$sv->ten,
      "lop"=>$sv->malophanhchinh,

    );
}
export_excel($data,$id);
function export_excel($data,$id)
{

    //Khởi tạo đối tượng
    $excel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
    $excel->setActiveSheetIndex(0);

    $excel->getActiveSheet()->setTitle('Danh sách lớp');
    $excel->getActiveSheet()->setPrintGridlines(TRUE);
//Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(8);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(8);
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('R')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('S')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('T')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('U')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('V')->setWidth(8);
    $excel->getActiveSheet()->getColumnDimension('W')->setWidth(10);


    $excel->getActiveSheet()
        ->getStyle('A:AO')
        ->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



//noi cell
    $excel->getActiveSheet()->mergeCells("C1:E1");
    $excel->getActiveSheet()->mergeCells("F1:W1");
    $excel->getActiveSheet()->mergeCells("D2:E2");
    $excel->getActiveSheet()->mergeCells("F2:H2");
    $excel->getActiveSheet()->mergeCells("I2:M2");
    $excel->getActiveSheet()->mergeCells("N2:P2");
    $excel->getActiveSheet()->mergeCells("Q2:W2");
    $excel->getActiveSheet()->mergeCells("D3:E3");
    $excel->getActiveSheet()->mergeCells("F3:H3");
    $excel->getActiveSheet()->mergeCells("I3:M3");
    $excel->getActiveSheet()->mergeCells("N3:P3");
    $excel->getActiveSheet()->mergeCells("Q3:W3");
    $excel->getActiveSheet()->mergeCells("C4:T4");
    $excel->getActiveSheet()->mergeCells("C6:D7");
    $excel->getActiveSheet()->mergeCells("A6:A7");
    $excel->getActiveSheet()->mergeCells("B6:B7");
   // $excel->getActiveSheet()->mergeCells("Y2:AE2");


    $excel->getActiveSheet()->mergeCells("V6:W6");
    $excel->getActiveSheet()->mergeCells("X6:Z6");
    $excel->getActiveSheet()->mergeCells("AA6:AA7");
    $excel->getActiveSheet()->mergeCells("AB6:AB7");
    $excel->getActiveSheet()->mergeCells("AC6:AC7");
    $excel->getActiveSheet()->mergeCells("AD6:AD7");
    $excel->getActiveSheet()->mergeCells("X2:AF2");
    $excel->getActiveSheet()->mergeCells("X3:Y3");
    $excel->getActiveSheet()->mergeCells("Z3:AA3");
    $excel->getActiveSheet()->mergeCells("AB3:AD3");
    $excel->getActiveSheet()->mergeCells("AE3:AF3");
    $excel->getActiveSheet()->mergeCells("X4:Y4");
    $excel->getActiveSheet()->mergeCells("Z4:AA4");
    $excel->getActiveSheet()->mergeCells("AB4:AD4");
    $excel->getActiveSheet()->mergeCells("AE4:AF4");
//    $excel->getActiveSheet()->mergeCells("C6:D6");
//    $excel->getActiveSheet()->mergeCells("C7:D7");
//    $excel->getActiveSheet()->mergeCells("C6:C7");
    for($i=4;$i<=20;$i++)
    {
        $excel->getActiveSheet()->mergeCellsByColumnAndRow($i,6,$i,7);
    }
    $excel->getActiveSheet()->mergeCells("AO6:AO7");
$excel->getActiveSheet()->mergeCells("AE6:AN6");
//
//    $excel->getActiveSheet()->mergeCells("U6:U7");
//    $excel->getActiveSheet()->mergeCells("E5:G5");

    $htmlHelper = new \PHPExcel_Helper_HTML();
    $title = '<font face = "Times New Roman" size = "11"> ĐẠI HỌC HÀNG HẢI VIỆT NAM</font> <br>'.'<font face = "Times New Roman" size = "11"><b> TRƯỜNG CAO ĐẲNG VIMARU</b></font>';
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
    $objDrawing = new PHPExcel_Worksheet_Drawing();

    $objDrawing->setPath('../../images/vmu.png');
    $objDrawing->setCoordinates('A1');
//setOffsetX works properly
        $objDrawing->setOffsetX(12);
        $objDrawing->setOffsetY(12);
    $objDrawing->setWidth(50);
    $objDrawing->setHeight(50);
    $objDrawing->setWorksheet($excel->getActiveSheet());
        $excel->getActiveSheet()->getRowDimension('1')->setRowHeight(60);
    $excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
    $excel->getActiveSheet()->getRowDimension('7')->setRowHeight(30);
    $excel->getActiveSheet()->getStyle("X2:AF2")->applyFromArray($stylerow);
    $excel->getActiveSheet()->getStyle("X3:AF3")->applyFromArray($stylerow);
    $excel->getActiveSheet()->getStyle("X4:AF4")->applyFromArray($stylerow);
      $excel->getActiveSheet()->getStyle("C1:E1")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("C6:E6")->applyFromArray($styletd);
    $excel->getActiveSheet()->getStyle("C7:E7")->applyFromArray($styletd);
    $excel->getActiveSheet()->getStyle("U6:W6")->applyFromArray($styletd);
    $excel->getActiveSheet()->getStyle("U7:W7")->applyFromArray($styletd);
    $excel->getActiveSheet()->getStyle("X6:AO6")->applyFromArray($styletd);
    $excel->getActiveSheet()->getStyle("X7:AO7")->applyFromArray($styletd);
    $excel->getActiveSheet()->getStyle("F6:T6")->applyFromArray($styletmau);
    $excel->getActiveSheet()->getStyle("F7:T7")->applyFromArray($styletmau);
    $excel->getActiveSheet()->getStyle("A6:B6")->applyFromArray($styletmau);
    $excel->getActiveSheet()->getStyle("A7:B7")->applyFromArray($styletmau);
    $excel->getActiveSheet()->getStyle("D2:E2")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("D3:E3")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("I2:M2")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("I3:M3")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("Q2:W2")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("Q3:W3")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("F1:W1")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("C4:T4")->applyFromArray($styletr);
    $excel->getActiveSheet()->getStyle("C2")->applyFromArray($stylettdnb);
    $excel->getActiveSheet()->getStyle("C3")->applyFromArray($stylettdnb);
    $excel->getActiveSheet()->getStyle("F2:H2")->applyFromArray($stylettdnb);
    $excel->getActiveSheet()->getStyle("F3:H3")->applyFromArray($stylettdnb);
    $excel->getActiveSheet()->getStyle("N2:P2")->applyFromArray($stylettdnb);
    $excel->getActiveSheet()->getStyle("N3:P3")->applyFromArray($stylettdnb);
    $excel->getActiveSheet()->getStyle("D2:E2")->applyFromArray($styletr);


      $excel-> getActiveSheet()->getStyle('F1:W1')->getAlignment()->setWrapText(true);
    $sum=1;
    for($i=5;$i<20;$i++)
    {
        $excel->getActiveSheet()->setCellValueByColumnAndRow($i,6,"T".$sum);
        $sum++;
    }
    $sum=1;
    for($i=30;$i<40;$i++)
    {
        $excel->getActiveSheet()->setCellValueByColumnAndRow($i,7,"L".$sum);
        $sum++;
    }
      $excel->getActiveSheet()->setCellValue("C1","TRƯỜNG CAO ĐẲNG VMU");
    $excel->getActiveSheet()->setCellValue("C2","Tên học phần: ");
    $excel->getActiveSheet()->setCellValue("C3","Số tín chỉ: ");
    $excel->getActiveSheet()->setCellValue("F2","Nhóm ");
    $excel->getActiveSheet()->setCellValue("F3","Loại HP: ");
    $excel->getActiveSheet()->setCellValue("N2","Mã HP: ");
    $excel->getActiveSheet()->setCellValue("N3","Hệ ĐT: ");
    $excel->getActiveSheet()->setCellValue("A6","TT");
    $excel->getActiveSheet()->setCellValue("B6","Mã Sv");
    $excel->getActiveSheet()->setCellValue("C6","Họ và tên");
    $excel->getActiveSheet()->setCellValue("E6","Lớp");
    $excel-> getActiveSheet()->getStyle('U6')->getAlignment()->setWrapText(true);
    $excel->getActiveSheet()->setCellValue("U6","Tiết\nVắng\nMặt");
    $excel->getActiveSheet()->setCellValue("V6","Tiết có mặt");
    $excel->getActiveSheet()->setCellValue("V7","Số tiết");
    $excel->getActiveSheet()->setCellValue("W7","%");
    $excel->getActiveSheet()->setCellValue("X6","Điểm kiểm tra");
    $excel->getActiveSheet()->setCellValue("X7","Z1");
    $excel->getActiveSheet()->setCellValue("Y7","Z2");
    $excel->getActiveSheet()->setCellValue("Z7","Z3");
    $excel->getActiveSheet()->setCellValue("AA6","X1");
    $excel->getActiveSheet()->setCellValue("AB6","X2");
    $excel->getActiveSheet()->setCellValue("AC6","X3");
    $excel->getActiveSheet()->setCellValue("AD6","X");
    $excel->getActiveSheet()->setCellValue("AE6","Điểm các lần thực hành");


    $excel->getActiveSheet()->setCellValue("AO6","Ghi chú");
    $lhp= \common\models\TblLophocphan::findOne(["lophp_id"=>$id]);
    $hp=\common\models\TblHocphan::findOne(["mahocphan"=>$lhp->mahocphan]);
    $excel->getActiveSheet()->setCellValue("D2",$hp->tenhocphan);
    $excel->getActiveSheet()->setCellValue("D3",$hp->sotinchi);
    (intval($lhp->nhom)<10)?$n="N0":$n="N";
    $excel->getActiveSheet()->setCellValue("I2",$n.$lhp->nhom);
    $excel->getActiveSheet()->setCellValue("Q2",$lhp->mahocphan);
    $excel->getActiveSheet()->setCellValue("C4","Công thức tính X= ………………………………………………………………………");
      $excel->getActiveSheet()->setCellValue("F1","BẢNG THEO DÕI HỌC TẬP CỦA SINH VIÊN\nHọc kỳ:….- Năm học 20… - 20...");
    $excel->getActiveSheet()->setCellValue("X2","Số tiết");
    $excel->getActiveSheet()->setCellValue("X3","LT");
    $excel->getActiveSheet()->setCellValue("Z3","TH,TN");
    $excel->getActiveSheet()->setCellValue("AB3","BTL");
    $excel->getActiveSheet()->setCellValue("AE3","Tổng");
      $numrow=8;
      $stt=1;
      foreach ($data as $row)
      {
          $excel->getActiveSheet()->getStyle("A".$numrow)->applyFromArray($styletstt);
          $excel->getActiveSheet()->getStyle("A".$numrow.":"."AO".$numrow)->applyFromArray($stylerow);
          $excel->getActiveSheet()->setCellValue("A".$numrow,$stt);
          $excel->getActiveSheet()->setCellValue("B".$numrow,$row["msv"]);
          $excel->getActiveSheet()->setCellValue("C".$numrow,$row["ten"]);
          $excel->getActiveSheet()->setCellValue("E".$numrow,$row["lop"]);
          $numrow++;
          $stt++;
      }
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