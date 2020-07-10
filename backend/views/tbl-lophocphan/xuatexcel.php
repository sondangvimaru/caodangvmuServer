<?php

//SELECT tbl_diem.msv,tbl_sinhvien.ten, tbl_sinhvien.malophanhchinh from tbl_sinhvien,tbl_diem,tbl_lophocphan,tbl_dangkyhocphan WHERE
//tbl_lophocphan.mahocphan=tbl_diem.mahocphan AND tbl_lophocphan.lophp_id=9 AND
//tbl_dangkyhocphan.lophp_id=tbl_lophocphan.lophp_id and tbl_diem.msv=tbl_dangkyhocphan.msv AND tbl_sinhvien.msv= tbl_dangkyhocphan.msv
require_once 'Classes/PHPExcel.php';

$conn= mysqli_connect("localhost", "root", "", "newcaodang") or die ("could not connect to mysql"); //thay testexcel thanh caodangvmu
$sql="SELECT tbl_diem.msv,tbl_sinhvien.ten, tbl_sinhvien.malophanhchinh,tbl_diem.diemX,tbl_diem.diemY,tbl_diem.diemZ,
CASE WHEN tbl_diem.diemZ>=9 THEN 'A' WHEN tbl_diem.diemZ>=7 THEN 'B'WHEN tbl_diem.diemZ>=5.5 THEN 'C' WHEN tbl_diem.diemZ>=4 
THEN 'D' ELSE 'F'END as diemchu ,CASE WHEN tbl_diem.diemZ>=9 THEN '4' WHEN tbl_diem.diemZ>=7 THEN '3'WHEN tbl_diem.diemZ>=5.5 THEN '2'
 WHEN tbl_diem.diemZ>=4 THEN '1' ELSE '0' END as diemso,tbl_diem.ghichu from tbl_sinhvien,tbl_diem,tbl_lophocphan,tbl_dangkyhocphan
  WHERE tbl_lophocphan.mahocphan=tbl_diem.mahocphan AND tbl_lophocphan.lophp_id='$lophp_id' AND tbl_dangkyhocphan.lophp_id=tbl_lophocphan.lophp_id 
  AND tbl_diem.msv=tbl_dangkyhocphan.msv
 AND tbl_sinhvien.msv= tbl_dangkyhocphan.msv GROUP BY tbl_diem.msv";
$result = $conn->query($sql);
if($result->num_rows>0)

{
    $array=[];
    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            $array[] = $row;
        }
    } else {
        echo "0 results";
    }
    export_excel($lophp_id,$array);

}else
{
    ?>
    <script>
        alert("Gặp lỗi khi export Danh sách lớp")
    </script>
    <?php
}

function export_excel($lophp_id,$data)
{

    //Khởi tạo đối tượng
    $excel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
    $excel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
    $excel->getActiveSheet()->setTitle('danh sách sinh viên');
    $excel->getActiveSheet()->setPrintGridlines(TRUE);
//Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);

    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(25);

    $excel->getActiveSheet()
        ->getStyle('A:L')
        ->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



//noi cell
    $excel->getActiveSheet()->mergeCells("A1:C1");
    $excel->getActiveSheet()->mergeCells("A2:J2");
    $excel->getActiveSheet()->mergeCells("A3:J3");
    $excel->getActiveSheet()->mergeCells("E5:G5");
    for($i=0;$i<10;$i++)
    {
        if($i!=4&&$i!=5&&$i!=6) $excel->getActiveSheet()->mergeCellsByColumnAndRow($i,5,$i,6);
    }
    $htmlHelper = new \PHPExcel_Helper_HTML();
    $title = '<font face = "Times New Roman" size = "11"> ĐẠI HỌC HÀNG HẢI VIỆT NAM</font> <br>'.'<font face = "Times New Roman" size = "11"><b> TRƯỜNG CAO ĐẲNG VIMARU</b></font>';
    $rich_text = $htmlHelper->toRichTextObject('<?xml encoding="UTF-8">' .$title);


    $stylehd = array(
        'font'  => array(

            'size'  => 11,

            'name'  => 'Time New Roman'
        ));
    $styletd = array(
        'font'  => array(
            'bold'=>true,
            'size'  => 14,

            'name'  => 'Time New Roman'
        ));
    $styletcol = array(
        'font'  => array(
            'bold'=>true,
            'size'  => 12,

            'name'  => 'Time New Roman'
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '202020')
            )
        )
    );
    $styletrow = array(
        'font'  => array(

            'size'  => 12,

            'name'  => 'Time New Roman'
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '202020')
            )
        )
    );
    $excel->getActiveSheet()->getStyle("A1:C1")->applyFromArray($stylehd);
    $excel->getActiveSheet()->getStyle("A5:J5")->applyFromArray($styletcol);
    $excel->getActiveSheet()->getStyle("A6:J6")->applyFromArray($styletcol);
    $excel-> getActiveSheet()->getStyle('A1:C1')->getAlignment()->setWrapText(true);
    $excel->getActiveSheet()->setCellValue("A1", $rich_text);
    $excel->getActiveSheet()->getStyle("A2:L2")->applyFromArray($styletd);
    $excel->getActiveSheet()->getStyle("A3:L3")->applyFromArray($styletd);
    $excel-> getActiveSheet()->getStyle('A2:L2')->getAlignment()->setWrapText(true);
    $excel-> getActiveSheet()->getStyle('A5:L5')->getAlignment()->setWrapText(true);
    $excel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
    $excel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
    $excel->getActiveSheet()->getRowDimension('6')->setRowHeight(40);
    $lhp= \common\models\TblLophocphan::findOne(["lophp_id"=>$lophp_id]);
    $hp=\common\models\TblHocphan::findOne(["mahocphan"=>$lhp->mahocphan]);
    $dkhp= \common\models\TblDangkyhocphan::findOne(["lophp_id"=>$lophp_id]);


    $arr_dk=explode("-",$dkhp->thoigiandangky);

    $excel->getActiveSheet()->setCellValue("A2", "DANH SÁCH ĐIỂM THI KẾT THÚC HỌC PHẦN\n NĂM HỌC: ".(intval($arr_dk[0])-1)."-".$arr_dk[0]);
    (intval($lhp->nhom)<10)?$n="N0":$n="N";
    $excel->getActiveSheet()->setCellValue("A3","Môn: ".$hp->tenhocphan ."  Nhóm: ".$n.$lhp->nhom);
    $excel->getActiveSheet()->setCellValue("A5", "STT");
    $excel->getActiveSheet()->setCellValue("B5", "Ma SV");
    $excel->getActiveSheet()->setCellValue("C5", "Họ và tên");
    $excel->getActiveSheet()->setCellValue("D5", "Lớp");

    $excel->getActiveSheet()->setCellValue("E5", "Điểm Thi");
    $excel->getActiveSheet()->setCellValue("H5", "Thang \nĐiểm \nChữ");
    $excel->getActiveSheet()->setCellValue("I5", "Thang\n Điểm\n 4");
    $excel->getActiveSheet()->getStyle("J5")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $excel->getActiveSheet()->setCellValue("j5", "Ghi chú");
    $excel->getActiveSheet()->setCellValue("E6", "X");
    $excel->getActiveSheet()->setCellValue("F6", "Y");
    $excel->getActiveSheet()->setCellValue("G6", "Z");
    $stt=1;
    $numrow=7;
    foreach ($data as $row)
    {
        $excel->getActiveSheet()->setCellValue('A'.$numrow, $stt);
        $excel->getActiveSheet()->setCellValue('B'.$numrow, $row["msv"]);
        $excel->getActiveSheet()->setCellValue('C'.$numrow, $row["ten"]);
        $excel->getActiveSheet()->setCellValue('D'.$numrow, $row["malophanhchinh"]);
        $excel->getActiveSheet()->setCellValue('E'.$numrow, $row["diemX"]);
        $excel->getActiveSheet()->setCellValue('F'.$numrow, $row["diemY"]);
        $excel->getActiveSheet()->setCellValue('G'.$numrow, $row["diemZ"]);
        $excel->getActiveSheet()->setCellValue('H'.$numrow, $row["diemchu"]);
        $excel->getActiveSheet()->setCellValue('I'.$numrow, $row["diemso"]);
        $excel->getActiveSheet()->setCellValue('J'.$numrow, $row["ghichu"]);
        $excel->getActiveSheet()->getStyle("A".$numrow.":J".$numrow)->applyFromArray($styletrow);
        $stt++;
        $numrow++;

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