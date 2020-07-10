<?php

if(isset($_GET['msv'])&& isset($_GET["lophp_id"])){
    $msv=$_GET['msv'];
    $lophp_id=$_GET["lophp_id"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "newcaodang";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql="DELETE FROM tbl_dangkyhocphan WHERE msv='$msv' AND lophp_id='$lophp_id'";  
    $arr=array();
    if( $conn->query($sql))
    {
        $arr[]=array("result"=>"Hủy thành công!");

    }else
    {
        $arr[]=array("result"=>"Hủy không thành công!");
    }
    
}
    $json = json_encode($arr,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    echo '{"data":'.$json.'}';
?>