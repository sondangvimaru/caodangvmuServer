<?php
 if(isset($_GET["arr"]) && isset($_GET["limit"]))
 {
   $str= $_GET["arr"];
   $limit=$_GET["limit"];
   if($limit==null)
   {
     $limit=10;
   }
   $arr_query;
   if($str!=null)
   {
     $arr_query=explode(",",trim($str));
 
   }
   
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "newcaodang";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  if($arr_query==null||count($arr_query)<1)
  {
    $sql = "SELECT baidang_id, tieude, anh_dai_dien, noidung,thoigiandang,tbl_tendanhmuc.tendanhmuc FROM tbl_baidang,tbl_tendanhmuc WHERE tbl_baidang.danhmuc_id=tbl_tendanhmuc.danhmuc_id ORDER BY thoigiandang DESC  LIMIT 0,$limit";

  }
  else
  {
    $sql = "SELECT baidang_id, tieude, anh_dai_dien, noidung,thoigiandang,tbl_tendanhmuc.tendanhmuc FROM tbl_baidang,tbl_tendanhmuc WHERE tbl_baidang.danhmuc_id=tbl_tendanhmuc.danhmuc_id AND";
 
    for($i=0;$i<count($arr_query); $i++)
    {
      $dm=$arr_query[$i];
      
    $sql.=" tbl_tendanhmuc.danhmuc_id='$dm'";
 
    if($i!=(count($arr_query)-1))
    {
      $sql.=" OR ";
    }
    else
    {

    break;
    }
    }
    $sql.="ORDER BY thoigiandang DESC  LIMIT 0,$limit";
  }
  

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