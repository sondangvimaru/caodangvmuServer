<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Gửi Thông báo</title>
     
        <script src="../../../ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <form  >
            
        <a style= " font-size: 50px"><b>Tiêu Đề</b> </a>
         
            <input style="width: 100%;" type="text"/><br> <br>
            <a style= " font-size: 50px"><b>Ảnh đại diện</b> </a>
             <input type="file" />
            <textarea name="editor1" style="width: 100%;" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor 4.
            </textarea>
            <script>
                
                var editor =  CKEDITOR.replace( 'editor1' );
              
         
            </script>
        </form>
    </body>
</html>