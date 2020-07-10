<?php

if(isset($_POST["content"]) && isset($_POST["type"]) && isset($_POST["msv"]))
{

    $content=$_POST["content"];
    $type=$_POST["type"];
    $msv=$_POST["msv"];
    $username = "root";
    $password = "";
    $servername = "localhost";
    $dbname = "newcaodang";
    $stt=1;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql="SELECT COUNT(*) as sum FROM tbl_feedback WHERE msv='$msv'";
    
    $result= $conn->query($sql);
    $r=$result->fetch_assoc();

    if(intval($r["sum"])>0)
    {
        $sql="SELECT MAX(stt) AS max FROM tbl_feedback WHERE msv='$msv'";
        $result= $conn->query($sql);
        $r=$result->fetch_assoc();
        $stt=intval($r["max"])+1;
    } 
    date_default_timezone_set('Asia/Bangkok');
    $date = date('Y-m-d H:s:i');
    $sql="INSERT INTO tbl_feedback(msv,content, from_user, type, stt, time) VALUES ('$msv','$content',0,'$type','$stt','$date')";
    $conn->query($sql);

}

?>