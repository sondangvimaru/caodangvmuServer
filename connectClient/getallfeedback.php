<?php

if(isset($_POST["msv"]))
{

    
    $msv=$_POST["msv"];
    $username = "root";
    $password = "";
    $dbname = "newcaodang";
    $servername = "localhost";
   
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql="SELECT * FROM tbl_feedback WHERE msv='$msv' ORDER BY stt ASC";
    
  
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