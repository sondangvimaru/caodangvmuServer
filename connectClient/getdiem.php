<?php

if(isset($_GET['msv']) && isset($_GET['dotdk_id'])) {
    $msv = $_GET['msv'];
    $dotdk_id=$_GET['dotdk_id'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "newcaodang";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT tbl_diem.msv,tbl_sinhvien.ten,tbl_hocphan.mahocphan,tbl_hocphan.tenhocphan,tbl_diem.diemX,tbl_diem.diemY,tbl_diem.diemZ,
 CASE WHEN tbl_diem.diemZ>=9 THEN 'A' WHEN tbl_diem.diemZ>=7 THEN 'B'WHEN tbl_diem.diemZ>=5.5 THEN 'C' WHEN tbl_diem.diemZ>=4
  THEN 'D' ELSE 'F'END as diemchu ,CASE WHEN tbl_diem.diemZ>=9 THEN '4' WHEN tbl_diem.diemZ>=7 THEN '3' WHEN tbl_diem.diemZ>=5.5 
  THEN '2' WHEN tbl_diem.diemZ>=4 THEN '1' ELSE '0' END as diemso,tbl_diem.ghichu FROM tbl_diem,tbl_sinhvien,tbl_hocphan
 WHERE tbl_diem.msv=tbl_sinhvien.msv AND tbl_diem.mahocphan=tbl_hocphan.mahocphan AND tbl_sinhvien.msv='$msv' AND dotdk_id='$dotdk_id'";
    $arr = array();

    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
        while ($row=$result->fetch_assoc())
        {
            $arr[]=$row;
        }
    }
    $json = json_encode($arr,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    echo '{"data":'.$json.'}';

}

?>