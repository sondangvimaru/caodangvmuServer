<?php

if(isset($_GET['msv'])){
    $msv=$_GET['msv'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "newcaodang";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    try
    {
  $file= fopen("../backend/web/newdotdk.txt","r");
    
    $line = fgets($file);
    
    fclose($file);
    }catch(Exception $e)
    {

    }
  
    $sql = "SELECT tbl_hocphan.tenhocphan,tbl_lichthi.thoigian,tbl_lichthi.diadiem,tbl_lichthi.sbd,tbl_lichthi.hinhthuc 
    FROM tbl_hocphan,tbl_lophocphan,tbl_lichthi,tbl_dangkyhocphan WHERE tbl_lophocphan.dotdk_id='$line' AND 
    tbl_lophocphan.mahocphan=tbl_hocphan.mahocphan AND tbl_lophocphan.lophp_id=tbl_lichthi.lophp_id AND
     tbl_dangkyhocphan.lophp_id=tbl_lophocphan.lophp_id AND tbl_dangkyhocphan.msv='$msv'";
    
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



