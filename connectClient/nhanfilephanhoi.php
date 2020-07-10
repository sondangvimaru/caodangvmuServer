<?php
function base64Tofile($base64_string, $output_file) {
    $file = fopen($output_file, "wb");

   

    fwrite($file, base64_decode($base64_string));
    fclose($file);

    
}
if(isset($_POST["content"]) && isset($_POST["type"]) && isset($_POST["msv"]) && isset($_POST["ex"]))
{

    $content=$_POST["content"];
    $type=$_POST["type"];
    $msv=$_POST["msv"];
    $ex=$_POST["ex"];
    $username = "root";
    $password = "";
    $dbname = "newcaodang";
    $servername = "localhost";
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
    $milliseconds = round(microtime(true) * 1000);
 
    $name_content=" ";
    
      if(trim($type)=="video")
      {
        $name_content="video_".$milliseconds.$ex;

        base64Tofile($content,"../../caodangvmu/video/".$name_content);
      }
      else if(trim($type)=="image")
      {

        $name_content="images_feedback".$milliseconds.$ex;
        base64Tofile($content,"../../caodangvmu/images/".$name_content);

      }
      else {
    
        $name_content="anyfile".$milliseconds.$ex;
        base64Tofile($content,"../../caodangvmu/anyfile/".$name_content);
      }

   $sql="INSERT INTO tbl_feedback(msv,content, from_user, type, stt, time) VALUES ('$msv','$name_content',0,'$type','$stt','$date')";
     $conn->query($sql);

}

?>