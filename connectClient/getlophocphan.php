<?php

if(isset($_GET['manganh'])){
    $manganh=$_GET['manganh'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "newcaodang";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT tbl_lophocphan.lophp_id,tbl_lophocphan.mahocphan,tbl_hocphan.tenhocphan,tbl_lophocphan.nhom,tbl_lophocphan.giangvien,tbl_hocphan.sotinchi,tbl_lophocphan.thoigianbatdau,tbl_lophocphan.thoigianketthuc,tbl_lophocphan.thu,tbl_dotdk.name , tbl_lophocphan.diadiem
    FROM tbl_lophocphan,tbl_hocphan,tbl_dotdk,tbl_phanlhp WHERE tbl_hocphan.mahocphan= tbl_lophocphan.mahocphan
     AND tbl_lophocphan.dotdk_id=tbl_dotdk.dotdk_id and tbl_dotdk.status=1 AND tbl_phanlhp.manganh='$manganh' AND tbl_lophocphan.lophp_id=tbl_phanlhp.lophp_id";
    
    $result = $conn->query($sql);
    
    $arr=array();
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
       $arr[]=$row;
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    }
    $json = json_encode($arr,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    echo '{"data":'.$json.'}';
?>