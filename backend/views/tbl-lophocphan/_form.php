<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblLophocphan */
/* @var $form yii\widgets\ActiveForm */
$r=" ";
?>

<div class="tbl-lophocphan-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php echo  $form->field($model,"tmp")-> widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblNganh::find()->all(),"manganh","tennganh"),
        'options' => ['placeholder' => 'Chọn ngành',"id"=>"nganh_select","onchange"=>"change()"],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php
    $hp=\common\models\TblHocphan::find()->all();
    $arr=array();
    foreach ($hp as $h)
    {
        $arr[]=([$h["manganh"].",".$h["tenhocphan"].",".$h["khoa_id"].",".$h["ky"].",".$h["mahocphan"]]);
    }
    echo Html::dropDownList("",null,$arr,["id"=>"tmp_sl"])?>
    <?php echo  $form->field($model,"tmp")-> widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblPhanlhp\TblKhoasv::find()->all(),"khoa_id","khoa_id"),
        'options' => ['placeholder' => 'Chọn Khóa',"id"=>"khoa_select","onchange"=>"change()"],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php
    $ctdt= \common\models\TblPhanlhp\TblCtdt:: find()->all();
    $arr_tmp=array();
    foreach ($ctdt as $ct)
    {
        $arr_tmp[]=([$ct["khoa_id"].",".$ct["nganh"].",".$ct["sonam"]]);
    }
    echo Html::dropDownList(null,null,$arr_tmp,["id"=>"ctdttmp"]);
    ?>
    <?= $form->field($model, 'tmp')->dropDownList(array(),["prompt"=>"--chọn--","id"=>"select_ky","onchange"=>"kychange();"]) ;?>
    <?= $form->field($model, 'mahocphan')->widget(\kartik\select2\Select2::classname(), [
        'data' =>  array(),
        'options' => ['placeholder' => 'Học phần',"id"=>"hpsl"],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'nhom')->textInput() ?>

<div>

<a id="myBtn" class="btn btn-primary">Lịch Học</a>
</div>


<div id="myModal" class="modal">

 
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Thêm Lịch học</h2>
    </div>
    <div class="modal-body">
 
     
     
 <a> Chọn Thứ </a>
    <select id="list_thu" style="width: 300px;height: 25px;">
    <option value="2" selected>Thứ 2</option>
    <option value="3">Thứ 3</option>
    <option value="4">Thứ 4</option>
    <option value="5" >Thứ 5</option>
    <option value="6" >Thứ 6</option>
    <option value="7" >Thứ 7</option>
    <option value="8" >Chủ Nhật</option>
    </select>


   <a>Buổi</a>
    <select id="list_buoi" style="width: 300px;height: 25px;">
    <option value="0" selected>Sáng</option>
    <option value="1">Chiều</option>
    </select> 
   <a>Tiết</a> 
   <input id="tiet" type="text" alt="Tiết học..." style="width: 400px;"/>
    <a onclick="click_lichhoc()" class="btn btn-danger" > <i style="padding: 20px;"><b>Thêm</b></i></a>
    <table id="table_lichhoc">
  <tr>
    
    <th>Thứ</th>
    <th>Buổi</th>
    <th>Tiết</th>
  </tr>
  <tbody>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selecttmp=document.getElementById("tmp_sl");

        selecttmp.style.display="none";
        var selecttmp2=document.getElementById("ctdttmp");
        selecttmp2.style.display = "none";
    }, false);
    function kychange() {
        var nganh_select=document.getElementById("nganh_select");
        var khoa_select=document.getElementById("khoa_select");
        var ky_select=document.getElementById("select_ky");
        var selecttmp=document.getElementById("tmp_sl");
        var selecthp=document.getElementById("hpsl");
        for (var i = selecthp.length-1; i > 0; i--) {
            selecthp.remove(i);
        }
        if(nganh_select.value!="" && khoa_select.value!=""&& ky_select.value!="" )
        {


           var nganh_selected=nganh_select.options[nganh_select.selectedIndex].value;
           var khoa_selected=khoa_select.options[khoa_select.selectedIndex].value;
            var ky_selected=ky_select.options[ky_select.selectedIndex].value;


            for( i=0;i<selecttmp.length;i++)
            {
                var tmpr=selecttmp.options[i].text.split(",");


                if(nganh_selected==tmpr[0] && khoa_selected==tmpr[2] && ky_selected==tmpr[3])
                {

                    var option = document.createElement("option");
                    option.text = tmpr[1];
                    option.value =tmpr[4];

                    selecthp.add(option);
                }
            }


        }
    }
function change() {
    var nganh_select=document.getElementById("nganh_select");
    var khoa_select=document.getElementById("khoa_select");
    var ky_select=document.getElementById("select_ky");
    var selecttmp=document.getElementById("tmp_sl");
    var selecthp=document.getElementById("hpsl");
    var selecttmp2=document.getElementById("ctdttmp");
    for (i = ky_select.length-1; i > 0; i--) {
        ky_select.remove(i);
    }
    if(nganh_select.value!="" && khoa_select.value!="")
    {
        for( i=0;selecttmp2.length;i++) {
            var tmp=selecttmp2.options[i].text.split(",");

            var nganh_selected=nganh_select.options[nganh_select.selectedIndex].value;
            var khoa_selected=khoa_select.options[khoa_select.selectedIndex].value;
            if(tmp[0].toString().trim()==khoa_selected.toString().trim() && tmp[1].toString().trim()==nganh_selected.toString().trim())
            {

                sonam=tmp[2];
                if(sonam>0)
                {

                    for(var i=1;i<=sonam*2;i++)
                    {

                        var optiont= document.createElement("option");
                        optiont.text = "Kỳ "+i;
                        optiont.value =i;
                        ky_select.add(optiont);

                    }
                }
                break;
            }
        }
    }

    if(nganh_select.value!="" && khoa_select.value!=""&& ky_select.value!="" )
    {

         nganh_selected=nganh_select.options[nganh_select.selectedIndex].value;
         khoa_selected=khoa_select.options[khoa_select.selectedIndex].value;
        var ky_selected=ky_select.options[ky_select.selectedIndex].value;
        for(var i=0;i<selecttmp.length;i++)
        {
            var tmpr=selecttmp.options[i].text.split(",");
            //
            // alert(khoa_selected+" "+tmpr[2]);
            // alert(nganh_selected+" "+tmpr[0]);
            // alert(ky_selected+" "+tmpr[3]);
            if(nganh_selected==tmpr[0] && khoa_selected==tmpr[2] && ky_selected==tmpr[3])
            {

                var option = document.createElement("option");
                option.text = tmpr[1];
                option.value =tmpr[4];

                selecthp.add(option);
            }
        }


    }

}
var table = document.getElementById("table_lichhoc");
var lichhoc=document.getElementById("arrlichhoc");
if(lichhoc.value!=null)
{
    var arr=lichhoc.value.split("-");
    if(arr.length>0)
    {
        arr.array.forEach(element => {
            var tmp=element.split("+");
            var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4=row.insertCell(3);
        cell1.innerHTML = tmp[0];
        cell2.innerHTML=(tmp[1]==0)?"Sáng":"Chiều";
        cell3.innerHTML=tmp[2];
        cell4.innerHTML='<a class='+'"'+'btn btn-primary'+'" id="row'+row.rowIndex+'" onclick="xoa_lichhoc(this.id)" style="padding-left:30px;padding-right:30px; text-align:center;"value='+row.rowIndex+' > Xóa </a>' ;

        });
    }
}

</script>
  
 
 </tbody>
</table>
          
    </div>
    <div class="modal-footer">
      <h1></h1>
    </div>
  </div>

</div>
<?= $form->field($model, 'r')->textInput(['maxlength' => true,'display'=>"none","type"=>"hidden",'id'=>'arrlichhoc']) ;?>
    <?= $form->field($model, 'giangvien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diadiem')->textInput(['maxlength' => true]) ?>
 

    <?= $form->field($model, 'dotdk_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\common\models\TblDotdk::findAll(["status"=>1]),'dotdk_id','name'),
        ['prompt'=>'--Chọn--']
    ) ?>

<?= $form->field($model, 'thoigianbatdau')->widget(dosamigos\datepicker\DatePicker::className(),
        [
            'language' => 'vi',
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy'
            ]
        ]) ?>

    <?= $form->field($model, 'thoigianketthuc')->widget(dosamigos\datepicker\DatePicker::className(),
        [
            'language' => 'vi',
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy'
            ]
        ]) ?>

  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success','id'=>'list_nganh']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function click_lichhoc()
{

    var thu=document.getElementById("list_thu");
    var buoi=document.getElementById("list_buoi");
    var tiet=document.getElementById("tiet");
    var thu_selected= thu.options[thu.selectedIndex].value;
    var buoi_selected= buoi.options[buoi.selectedIndex].value;
   
    var lichhoc=document.getElementById("arrlichhoc");
    if(tiet.value!=null)
    {
        lichhoc.value+=thu_selected+"+"+buoi_selected+"+"+tiet.value+"-";
        var table = document.getElementById("table_lichhoc").getElementsByTagName('tbody')[0];
        var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4=row.insertCell(3);
        cell1.innerHTML = thu_selected;
        cell2.innerHTML=(buoi_selected==0)?"Sáng":"Chiều";
        cell3.innerHTML=tiet.value;
        cell4.innerHTML='<a class='+'"'+'btn btn-primary'+'" id="row'+row.rowIndex+'" onclick="xoa_lichhoc(this.id)" style="padding-left:30px;padding-right:30px; text-align:center;"value='+row.rowIndex+' > Xóa </a>' ;

    }
}
function xoa_lichhoc(value)
{
    var table = document.getElementById("table_lichhoc");
    var str=value[value.length-1];
     table.deleteRow(str);
     var lichhoc=document.getElementById("arrlichhoc");
if(lichhoc.value!=null)
{
    var arr=lichhoc.value.split("-");
    var newvalue=" ";
    if(arr.length>0)
    {
       
        for(var i=arr.length-2;i>=0;i--)
        {
            if(i!=(arr.length-str-1))
            {
           if(arr[i]!=null)
           {
            newvalue+=arr[i]+"-";
           }
            }
        }
        
    }
    lichhoc.value=newvalue;
}

}
</script>
