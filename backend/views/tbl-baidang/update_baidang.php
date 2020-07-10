

<?php
if(isset($_POST["upload"]))
{

  
    if($_FILES['anhdaidien']!=null &&  $_FILES['anhdaidien']['name']!=" " && trim($_FILES['anhdaidien']['name'])!=null)
    {
       
        $file=fopen("test.txt","w");
        fwrite($file, $_FILES['anhdaidien']['name']);
        fclose($file);


    $fileName=$_FILES['anhdaidien']['name'];
    $filetmpname=$_FILES['anhdaidien']['tmp_name'];
    $fileex=pathinfo($fileName,PATHINFO_EXTENSION);
    $allowType=array('jpeg','png','jpg');
    

    if(!in_array($fileex,$allowType))
    {

        ?>

        <script>alert("Định dạng không hợp lệ");</script>

        <?php

    }else
    {
        try {
            if($fileName!=null)
            {
                $milliseconds = round(microtime(true) * 1000);
                $nameimgae=$milliseconds.$fileName;
                move_uploaded_file($filetmpname,"../../../images/".$nameimgae);
            }else
            {
                $nameimgae="no-image.jpg";
            }


            $data=$_POST['editor1'];
            $tieude=$_POST["tieude"];
            $select=$_POST["select"];
            $id=$_POST["idbd"];

            
            $conn= mysqli_connect("localhost", "root", "", "newcaodang") or die ("could not connect to mysql"); 
        $sql="select * from tbl_tendanhmuc where tendanhmuc='$select'";
        $result=$conn->query($sql);
        $r=$result->fetch_assoc();
        $id_dm=$r["danhmuc_id"];
        
            date_default_timezone_set('Asia/Bangkok');
            $date = date('Y-m-d H:s:i');
        $sql="UPDATE tbl_baidang SET tieude='$tieude',anh_dai_dien='$nameimgae',noidung='$data',thoigiandang='$date',danhmuc_id=$id_dm WHERE baidang_id='$id'";


        if($conn->query($sql))
        {
            ?>
            <script>

                alert("Cập nhật thành công!");
                window.location="http://localhost:4432/caodangvmu/backend/web/index.php?r=tbl-baidang%2Findex";
            </script>
            <?php

        }



        }catch (Exception $e)
        {
            ?>
            <script>
                alert("Gặp lỗi khi cập nhật bài! Vui lòng kiểm tra lại dữ liệu đầu vào");
            </script>
            <?php
        }

    }
}
else
{
    
    $data=$_POST['editor1'];
    $tieude=$_POST["tieude"];
    $select=$_POST["select"];
    $id=$_POST["idbd"];

    
    $conn= mysqli_connect("localhost", "root", "", "newcaodang") or die ("could not connect to mysql"); 
$sql="select * from tbl_tendanhmuc where tendanhmuc='$select'";
$result=$conn->query($sql);
$r=$result->fetch_assoc();
$id_dm=$r["danhmuc_id"];

    date_default_timezone_set('Asia/Bangkok');
    $date = date('Y-m-d H:s:i');
  
$sql="UPDATE tbl_baidang SET tieude='$tieude',noidung='$data',thoigiandang='$date',danhmuc_id=$id_dm WHERE baidang_id='$id'";

 
if($conn->query($sql))
{
    ?>
    <script>

        alert("Cập nhật thành công!");
        window.location="http://localhost:8000/caodangvmu/backend/web/index.php?r=tbl-baidang%2Findex";
    </script>
    <?php

}
}

//     $data=$_POST['editor1'];




}

if(isset($_GET["baidang_id"]))
{
    $baidang_id=$_GET["baidang_id"];

    $conn= mysqli_connect("localhost", "root", "", "newcaodang") or die ("could not connect to mysql"); 

    $sql="SELECT * FROM tbl_baidang WHERE baidang_id='$baidang_id'";

    $result= $conn->query($sql);
    
    $r=$result->fetch_assoc();
    $file= fopen("noidungtmp.txt","w");
    fwrite($file,$r["noidung"]);
    fclose($file);
    $danhmuc=$r["danhmuc_id"];
    $sql="SELECT * FROM tbl_tendanhmuc WHERE danhmuc_id='$danhmuc'";
    $dm=$conn->query($sql)->fetch_assoc();

    ?>
<script>

document.addEventListener('DOMContentLoaded', function() {
    var bd_id='<?php echo $baidang_id?>';
    var td= '<?php echo $r["tieude"];?>';
   
    var imgpath='<?php echo $r["anh_dai_dien"];?>';
    

    var img=document.getElementById("preview");
    
    img.src="../../../images/"+imgpath;
   
    var tieude= document.getElementById("tieude");
   
    tieude.value=td;
    
    fetch('noidungtmp.txt')
  .then(response => response.text())
  .then(data => {
   
    CKEDITOR.instances["editor1"].setData(data);
  });
    var danhmuctag=document.getElementById("single");
    var dm='<?php echo $dm["tendanhmuc"] ?>';
    danhmuctag.value=dm;

  var id=document.getElementById("idbd");
  id.value=bd_id;
}, false);
</script>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Đăng bài</title>

    <script src="ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<form  method="post"  style="padding: 200px;background-color: #0b93d5" action=" "   enctype="multipart/form-data" >
    <input id ="idbd" name="idbd" type="hidden" />
    <a style= " font-size: 20px;color: white"><b>Tiêu Đề</b> </a>

    <input id="tieude" name="tieude" style="width: 100%;" type="text"/><br> <br>
    <a style= " font-size: 20px;color: white"><b>Ảnh đại diện</b> </a><br><br>

    <input name="anhdaidien" type='file' onchange="readURL(this);" /><br><br>
    <img id="preview"  alt="avatar image"  width="200px" height="200px"/>


    <br>
    <a style= " font-size: 20px;color: white"><b>Nội dung</b> </a><br>
    <textarea name="editor1" style="width: 100%;" id="editor1" rows="10" cols="80">

            </textarea>

    <br>
    <a style= " font-size: 20px;color: white"><b>Danh Mục</b> </a><br>
    <select name="select"  id="single" class="js-states form-control">
       <?php

       $conn= mysqli_connect("localhost", "root", "", "newcaodang") or die ("could not connect to mysql");
        $sql="SELECT * FROM tbl_tendanhmuc";
        $result=$conn->query($sql);
       while ($row=$result->fetch_assoc())
       {


           ?>

           <option ><?php echo $row["tendanhmuc" ];?></option>
        <?php

       }


       ?>
    </select>


    <input name="upload" style="margin-top: 30px;align-content: center "  type="submit"  value="Cập nhật" class="btn btn-primary"/>


    <script>

        var editor = CKEDITOR.replace( 'editor1',{
            height: 300,
            extraPlugins : 'filebrowser',
            filebrowserBrowseUrl:'browser.php',
            filebrowserUploadMethod:"form",
            filebrowserUploadUrl:"upload.php"
            
        });
        

        function readURL(input) {


            if (input.files && input.files[0]) {


                var reader = new FileReader();

                reader.onload = function (e) {
                     document.getElementById("preview").src=e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }




    </script>
</form>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</html>
<?php



}
?>
