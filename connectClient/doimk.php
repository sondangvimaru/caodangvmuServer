<?php

if(isset($_POST["old_pass"]) && isset($_POST["newpassword"]) && isset($_POST["msv"]))
{

    $old_password=$_POST["old_pass"];
    $new_password=$_POST["newpassword"];
    $msv=$_POST["msv"];
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "newcaodang";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$arr =array();
$sql = "SELECT COUNT(*) AS result FROM sv_user WHERE msv='$msv' and password='$old_password'";

$result = $conn->query($sql);
$sum=$result->fetch_assoc();
if(intval($sum["result"])>0)
{

    $sql="UPDATE sv_user SET password='$new_password' WHERE msv='$msv'";
 if($conn->query($sql))
 {
    $arr[]=array('result'=>'Đổi mật khẩu thành công');
 }else
 {
    $arr[]=array('result'=>'Đổi mật không khẩu thành công');
 }
    

}else
{
    $arr[]=array('result'=>'Mật khẩu cũ không đúng');


}

 
$conn->close();
}
$json = json_encode($arr,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
echo '{"data":'.$json.'}';

 

?>