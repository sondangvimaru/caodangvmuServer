<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblHocphan */
/* @var $form yii\widgets\ActiveForm */
$ky=null;
$sonam=null;
if($model->ky!=null)
    $ky=$model->ky;
if($model->manganh!=null)
{
    $dt=\common\models\TblPhanlhp\TblCtdt::findOne(["nganh"=>$model->manganh,"khoa_id"=>$model->khoa_id]);
    if($dt!=null)
        $sonam=$dt->sonam;
}
?>

<div class="tbl-hocphan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mahocphan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenhocphan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sotinchi')->textInput() ?>
    

    <?= $form->field($model, 'manganh')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblNganh::find()->all(),"manganh","tennganh"),
        'options' => ['placeholder' => 'Ngành',"onchange"=>"change();","id"=>"nganhselect"],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <?= $form->field($model,'khoa_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\common\models\TblPhanlhp\TblKhoasv::find()->all(),"khoa_id","khoa_id"),

            ['prompt'=>'--Chọn--',"onchange"=>"change()","id"=>"khoa_select"]

    );
    ?>
    <?php echo Html::a(null,null,["id"=>"tmpa"])?>
    <?php
    $ctdt= \common\models\TblPhanlhp\TblCtdt:: find()->all();
    $arr_tmp=array();
    foreach ($ctdt as $ct)
    {
        $arr_tmp[]=([$ct["khoa_id"].",".$ct["nganh"].",".$ct["sonam"]]);
    }
    echo Html::dropDownList(null,null,$arr_tmp,["id"=>"ctdttmp"]);
    ?>
<?= $form->field($model, 'ky')->dropDownList(array(),["prompt"=>"--chọn--","id"=>"select_ky"]) ;?>
    <?= $form->field($model, 'mamontienquyet')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblHocphan::find()->all(),"mahocphan","tenhocphan"),
        'options' => ['placeholder' => 'Môn Tiên Quyết'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
function ex($nganh,$khoasl)
{
    $sql="select * from tbl_ctdt where nganh='".$nganh."' AND khoa_id='".$khoasl."'";
    $conn= mysqli_connect("localhost", "root", "", "newcaodang") or die ("could not connect to mysql"); //thay testexcel thanh caodangvmu

    $r=$conn->query($sql);
    $row=$r->fetch_assoc();
    if($row!=null) $sonam=$row["sonam"];
    else $sonam=0;
    return $sonam;
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selecttmp=document.getElementById("ctdttmp");
        selecttmp.style.display = "none";
            var ky="<?php echo  $ky;?>";
            var sonam="<?php echo $sonam;?>";

        var select_ky=document.getElementById("select_ky");
            if(sonam!=null)
            {

                if(sonam>0)
                {

                    for(var i=1;i<=sonam*2;i++)
                    {

                        var option = document.createElement("option");
                        option.text = "Kỳ "+i;
                        option.value =i;

                        select_ky.add(option);
                        if(i==ky) select_ky.selectedIndex=i;
                    }
                }
            }

    }, false);

    // function change() {
    //     var khoa=document.getElementById("tblhocphan-khoa_id");
    //     var nganh=document.getElementById("nganhselect");
    //     var ky=document.getElementById("select_ky");
    //     if(nganh.value!="")
    //     {
    //         khoa.style.display="block";
    //     }else
    //     {
    //         khoa.style.display="none";
    //     }
    //     if(khoa.value!="--chọn--" && nganh.value!="")
    //     {
    //         ky.disabled = false;
    //     }else
    //     {
    //         ky.disabled = true;
    //     }
    // }
  function change(khoa) {

        var select_ky=document.getElementById("select_ky");
        var tmpa=document.getElementById("tmpa");
      var selecttmp=document.getElementById("ctdttmp");
        var select_khoa=document.getElementById("khoa_select");
        var nganh_select=document.getElementById("nganhselect");
        var sonam=0;
        for (i = select_ky.length-1; i > 0; i--) {
            select_ky.remove(i);
        }
        if(nganh_select.value!=""&& select_khoa.value!="--Chọn--" &&select_khoa.value!="")
        {
            var nganh_selected=nganh_select.options[nganh_select.selectedIndex].value;
            var khoa_selected=select_khoa.options[select_khoa.selectedIndex].value;

            for(var i=0;selecttmp.length;i++)
            {
                var tmp=selecttmp.options[i].text.split(",");


                if(tmp[0].toString().trim()==khoa_selected.toString().trim() && tmp[1].toString().trim()==nganh_selected.toString().trim())
                {

                    sonam=tmp[2];
                    if(sonam>0)
                    {

                        for(var i=1;i<=sonam*2;i++)
                        {

                            var option = document.createElement("option");
                            option.text = "Kỳ "+i;
                            option.value =i;
                            select_ky.add(option);

                        }
                }
                    break;
            }








            }
        }



        // for (var i = 0; i < selecttmp.length; i++) {
        //   if(selecttmp[i].value==khoa.value)
        //   {
        //       sonam=selecttmp[i].text;
        //       break;
        //   }
        //
        // }


    }
</script>