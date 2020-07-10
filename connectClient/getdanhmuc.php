<?php

 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "newcaodang";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM tbl_tendanhmuc";
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

 

?>