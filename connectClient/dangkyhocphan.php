<?php


if(isset($_GET['msv']) &&isset($_GET["lophp_id"])){
    $msv=$_GET['msv'];
    $lophp_id=$_GET["lophp_id"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "newcaodang";
    $arr=array();
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql="SELECT * FROM tbl_dangkyhocphan where msv='$msv' and lophp_id='$lophp_id' ";

    $result= $conn->query($sql);
    if($result->num_rows>0)
    {
        $arr[]=array("result"=>"Bạn đã ở trong lớp này rồi!");
    } else {


    
        $sql="SELECT * FROM tbl_lophocphan where lophp_id='$lophp_id' ";
        $result=$conn->query($sql);
        $lhp= $result->fetch_assoc();
        if($lhp!=null)
        {

        
        $mhp=$lhp["mahocphan"];
       
        $sql="SELECT * FROM tbl_hocphan where mahocphan='$mhp' ";
        $result=$conn->query($sql);
        $hp= $result->fetch_assoc();
                
    if($lhp!=null && $hp!=null)
    {
    
    if($hp["mamontienquyet"]!=null)
    {
        $sql="SELECT COUNT(tbl_diem.msv) as sum FROM tbl_diem,tbl_hocphan,tbl_lophocphan WHERE tbl_lophocphan.lophp_id='$lophp_id' AND tbl_diem.msv='$msv' 
        AND tbl_hocphan.mahocphan=tbl_lophocphan.mahocphan 
        AND tbl_hocphan.mamontienquyet=tbl_diem.mahocphan AND tbl_diem.diemZ>=4 GROUP BY tbl_diem.msv";
        $result=$conn->query($sql);
        $r= $result->fetch_assoc();
        if(intval($r["sum"])>0)
        {
        date_default_timezone_set('Etc/GMT+7');
            $date = date('Y-m-d H:i:s');
            $sql="INSERT INTO  tbl_dangkyhocphan(thoigiandangky,lophp_id,msv) VALUES ('$date','$lophp_id','$msv')";
            $conn->query($sql);
            $sql="Select * from tbl_lophocphan where lophp_id='$lophp_id'";
            $rr=$conn->query($sql);
            $lhp=$rr->fetch_assoc();
            $mhp=$lhp["mahocphan"];
            $dotdk_id=$lhp["dotdk_id"];
            $sql="INSERT INTO tbl_diem(mahocphan,msv,dotdk_id) VALUES('$mhp','$msv','$dotdk_id')";
            $conn->query($sql);
            $arr[]=array("result"=>"Đăng ký thành công!");
        }else
        {
            $arr[]=array("result"=>"Bạn chưa đủ điều kiện tiên quyết để đăng ký học phần này!");
        }

    }
    else  
    {
        date_default_timezone_set('Etc/GMT+7');
        $date = date('Y-m-d H:i:s');
        $sql="INSERT INTO  tbl_dangkyhocphan(thoigiandangky,lophp_id,msv) VALUES ('$date','$lophp_id','$msv')";
        $conn->query($sql);
        $sql="Select * from tbl_lophocphan where lophp_id='$lophp_id'";
        $rr=$conn->query($sql);
        $lhp=$rr->fetch_assoc();
        $mhp=$lhp["mahocphan"];
        $dotdk_id=$lhp["dotdk_id"];
        $sql="INSERT INTO tbl_diem(mahocphan,msv,dotdk_id) VALUES('$mhp','$msv','$dotdk_id')";
        $conn->query($sql);
        
        $arr[]=array("result"=>"Đăng ký thành công!");
    }
}
}
}
  $json = json_encode($arr,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    echo '{"data":'.$json.'}';
    }
    
?>


 