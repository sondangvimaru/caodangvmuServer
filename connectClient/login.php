<?php
if(isset($_POST['msv']) && isset($_POST['password'])){
$msv=$_POST['msv'];
$pass=$_POST['password'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newcaodang";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS result FROM sv_user WHERE msv='$msv' and password='$pass'";

$result = $conn->query($sql);

$arr=array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $arr[]=array(
       
    'result'=>$row['result'],
);
  }
} else {
  echo "0 results";
}
$conn->close();
}
$json = json_encode($arr,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
echo '{"data":'.$json.'}';
?>