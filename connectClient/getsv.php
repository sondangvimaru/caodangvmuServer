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

$sql = "SELECT * FROM tbl_sinhvien WHERE msv='$msv'";

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