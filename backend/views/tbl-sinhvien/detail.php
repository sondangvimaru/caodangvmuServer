<?php

if(isset($_GET['msv']))
{

    $msv=$_GET['msv'];
    $conn= mysqli_connect("localhost", "root", "", "newcaodang") or die ("could not connect to mysql"); //thay testexcel thanh caodangvmu
    $sql="select * from tbl_sinhvien where msv={$msv}";

    $result = $conn->query($sql);
    if($result->num_rows>0) {
        $row = $result->fetch_assoc();
    }


}
?>

<html>

    <title>
       <?php echo $row["ten"];?>
    </title>

    <body style="text-align: center;">



    <script>
        window.print();

    </script>
    <div style=" text-align: justify; display: inline-table;width: auto;height: auto;vertical-align: middle;">


        <div style="margin:auto;vertical-align: middle;display: inline-table;border-width: 0.5cm;border: outset;border-color: black;width: 100px; height: 350px;">

            <div style="margin-top: 5px;">

                <span style="margin: auto;display: table"> Số đăng ký</span>
                <span  style="margin: auto;display: table">.....................</span>
            </div>
            <hr style="margin-top: 15%;height: 1px; width: 100px;background-color: black;">
            <div>
               <?php echo  '<img src="'.'../../../images/'.$row['anh_dai_dien'].'"'.' alt="anh dai dien" width="99px" height="200px" style="margin-left: 2px;vertical-align:middle;text-align: center;">'?>
            </div>
        </div>

        <div  style="margin:auto;vertical-align: middle;display: inline-block;margin-left: 15px;">
            <b style="align-items: center;">SƠ LƯỢC LÝ LỊCH</b>

            <br>
            <span> Họ tên khai sinh: <?php echo $row["ten"];?>  Nam, Nữ: <?php  if(intval($row["gioitinh"])==1){echo "Nam";}else{echo "Nữ";};?>	</span>
            <br>
            <span>  Tên thường gọi: <?php echo $row["ten_thuong_goi"];?></span>
            <br>
            <?php $ns = $row["ngaysinh"];
                $arr_ns=explode("-",$ns);
            ?>
            <span> Sinh ngày:  <?php echo $arr_ns[2];?> Tháng <?php echo $arr_ns[1]?> Năm <?php echo $arr_ns[0]?> Nơi sinh: <?php echo $row["noi_sinh"]?></span>
            <br>
            <span> Quê quán:  <?php  echo $row["quequan"]?></span>
            <br>
            <span> Nơi đăng ký thường trú:<?php echo $row["noidangkythuongtru"]  ?></span>
            <br>
            <?php
            $s="select * from tbl_dantoc where id_dantoc={$row['id_dantoc']}";

            $r = $conn->query($s);
            if($r->num_rows>0) {
                $dt = $r->fetch_assoc();
            }

            ?>

            <span> Dân tộc: <?php echo  $dt["name"]; ?>  Tôn giáo: <?php if(intval($row["tongiao"])==1){echo "Có";}else{echo "Không";}; ?>  	</span>
            <br>
            <span>  Trình độ học vấn trước khi vào học:<?php echo $row["trinhdohocvan"] ?></span>
            <br>
            <span>Ngày tham gia Đảng CSVN:<?php echo $row["ngay_tham_gia_dcsvn"] ?>   Ngày chính thức:<?php echo $row["ngay_chinh_thuc_tg_dcsvn"] ?></span>
            <br>
            <span>  Ngày kết nạp vào Đoàn TNCS Hồ Chí Minh:<?php echo $row["ngayketnapdoan"] ?></span>
            <br>
            <span> Họ và tên bố:<?php echo $row["hotenbo"] ?> Nghề nghiệp:<?php echo $row["nghenghiepbo"] ?></span>
            <br>
            <span>  Họ và tên mẹ:<?php echo $row["hotenme"] ?>Nghề nghiệp:<?php echo $row["nghenghiepme"] ?></span>
            <br>
            <span> Họ và tên vợ (chồng): <?php echo $row["ho_va_ten_vo_chong"] ?> Nghề nghiệp:<?php echo $row["nghe_nghiep_vo_chong"] ?></span>
            <br>
            <span>  Đối tượng thuộc diện chính sách: <?php echo $row["doituongthuocdienchinhsach"] ?>	</span>
            <br>
            <span> Nghề nghiệp làm trước khi vào học: <?php echo $row["nghenghieplamtruockhivaohoc"] ?></span>
            <br>
            <span> Điạ chỉ liên lạc:<?php echo $row["diachi"] ?> 	 Điện thoại: <?php echo $row["sdt"] ?></span>
            <br>
            <?php
            $arr_nv= explode(" ",trim($row["nguyenvongvieclam"]));
            if(count($arr_nv)<4)
            {
                ?>
                <span> Nguyện vọng việc làm sau khi kết thúc khóa học: <?php echo $row["nguyenvongvieclam"] ?></span>
                <?php
            }
            else
            {
                ?>
                <span> Nguyện vọng việc làm sau khi kết thúc khóa học: <?php for ($i=0;$i<4;$i++){ echo $arr_nv[$i]." "; } ?></span>
                <br>
                <span>  <?php for ($i=4;$i<count($arr_nv);$i++){ echo $arr_nv[$i]." "; } ?></span>
                <?php

            }

            ?>





        </div>
    </div>

    </body>
</html>
<?php  $conn->close();?>