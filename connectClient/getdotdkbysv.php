<?php

if(isset($_GET['msv']) ) {
    $msv = $_GET['msv'];
 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "newcaodang";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT tbl_diem.dotdk_id ,tbl_dotdk.name FROM tbl_diem,tbl_dotdk WHERE tbl_diem.dotdk_id=tbl_dotdk.dotdk_id AND tbl_diem.msv='$msv' GROUP BY tbl_diem.dotdk_id";
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