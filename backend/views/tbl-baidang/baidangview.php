<?php

if(isset($_GET["baidang_id"]))
{
    $baidang_id=$_GET["baidang_id"];
    $conn= mysqli_connect("localhost", "root", "", "newcaodang") or die ("could not connect to mysql");  

    $sql= "select *from tbl_baidang where baidang_id='$baidang_id'";

    $result= $conn->query($sql);
    $r=$result->fetch_assoc();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $r["tieude"]  ?></title>
</head>
<body style="align-content: center;" >

<div style="margin:100px;">

    <h1 style="text-align: center;"><b><?php echo $r["tieude"]  ?></b></h1>
    <hr style="text-align: center;">
    <div>

   
<?php echo $r["noidung"] ?> 

</div>
</div>
</body >
</html>

 <?php
}
else
{
    ?>

<script>

    window.location="http://localhost:8080/caodangvmu/backend/web/index.php?r=tbl-baidang%2Findex";
</script>
    <?php
}
?>


