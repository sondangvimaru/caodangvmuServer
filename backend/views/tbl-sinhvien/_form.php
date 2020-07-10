<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblSinhvien */
/* @var $form yii\widgets\ActiveForm */
if($model!=null);
$gt=intval( $model["gioitinh"]);
?>

<div class="tbl-sinhvien-form">

    <?php $form = ActiveForm::begin( ['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'msv')->textInput() ?>

    <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngaysinh')->widget(dosamigos\datepicker\DatePicker::className(),
        [
            'language' => 'vi',
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy'
            ]
        ]) ?>
    <?php
    if($gt==1)
    {
        $nam=$gt;
        $nu=0;
    }
    else if($gt==0)
    {
        $nu=1;
        $nam=$gt;
    }




    ?>
    <?= $form->field($model, 'gioitinh')->radioList([$nam=>'Nam',$nu=>'Nữ'],['inline'=>'true','item' => function ($index, $label, $name, $checked, $value) {
        if($value==1) $checked=true ;else $checked=false;
        return Html::radio($name, $checked, ['value' => $value,'label'=>$label]);
    }, ]) ?>

    <?= $form->field($model, 'diachi')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'manganh')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblNganh::find()->all(),"manganh","tennganh"),
        'options' => ['placeholder' => 'Ngành',"id"=>"nganhsl"],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'malophanhchinh')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblLophanhchinh::find()->all(),"malophanhchinh","tenlophc"),
        'options' => ['placeholder' => 'Lớp Hành Chính',"id"=>"selectlhc"],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'sdt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tongiao')->checkbox() ?>

    <?= $form->field($model, 'trinhdohocvan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngayketnapdoan')->widget(dosamigos\datepicker\DatePicker::className(),
        [
            'language' => 'vi',
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy'
            ]
        ]) ?>

    <?= $form->field($model, 'hotenbo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hotenme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nghenghiepbo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nghenghiepme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doituongthuocdienchinhsach')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nghenghieplamtruockhivaohoc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'noidangkythuongtru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nguyenvongvieclam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_dantoc')-> widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\TblDantoc::find()->all(),"id_dantoc","name"),
        'options' => ['placeholder' => 'Dân Tộc'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'quequan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anh_dai_dien')->fileInput() ?>

    <?php if(!$model->isNewRecord):?>
        <?=Html::img('../../images/'.$model->anh_dai_dien,['width'=>'200px'])?>
        <p><?=Html::a('<i class="glyphicon glyphicon-trash"></i> Xoa',
                \yii\helpers\Url::toRoute(['tbl-sinhvien/xoa-anh','idsv'=>$model->msv]),
                ['class'=>'btn btn-danger'])?></p>
    <?php endif;?>

    <?= $form->field($model, 'ten_thuong_goi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'noi_sinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_tham_gia_dcsvn')->widget(dosamigos\datepicker\DatePicker::className(),
        [
            'language' => 'vi',
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy'
            ]
        ]) ?>

    <?= $form->field($model, 'ngay_chinh_thuc_tg_dcsvn')->widget(dosamigos\datepicker\DatePicker::className(),
        [
            'language' => 'vi',
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy'
            ]
        ]) ?>

    <?= $form->field($model, 'ho_va_ten_vo_chong')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nghe_nghiep_vo_chong')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    function sortSelect(selElem) {
        var tmpAry = new Array();
        for (var i=0;i<selElem.options.length;i++) {
            tmpAry[i] = new Array();
            tmpAry[i]["text"] = selElem.options[i].text;
            tmpAry[i]["value"] = selElem.options[i].value;
        }
        tmpAry.sort(function(a, b){
            var x = a.text.toLowerCase();
            var y = b.text.toLowerCase();
            if (x < y) {return 1;}
            if (x > y) {return -1;}
            return 0;
        });
        while (selElem.options.length > 0) {
            selElem.options[0] = null;
        }
        for (var i=0;i<tmpAry.length;i++) {
            var op = new Option(tmpAry[i]["text"], tmpAry[i]["value"]);
            selElem.options[i] = op;
        }
        return;
    }
    document.addEventListener('DOMContentLoaded', function() {
        var sl=document.getElementById("nganhsl");
        sortSelect(sl);
        var lhc=document.getElementById("selectlhc");
        sortSelect(lhc);
        var ns= document.getElementById("tblsinhvien-ngaysinh");
        var date= "<?php echo date("d-m-Y",strtotime($model->ngaysinh));?>";

        if(date!=null)
        {
            ns.value=""+date;
        }

        var kn=document.getElementById("tblsinhvien-ngayketnapdoan");
        var datekn= "<?php echo date("d-m-Y",strtotime($model->ngayketnapdoan));?>";
        if(datekn!=null)
        {
            kn.value=""+datekn;
        }
        var kn=document.getElementById("tblsinhvien-ngay_tham_gia_dcsvn");
        var datekn= "<?php echo date("d-m-Y",strtotime($model->ngay_tham_gia_dcsvn));?>";
        if(datekn!=null)
        {
            kn.value=""+datekn;
        }
        var kn=document.getElementById("tblsinhvien-ngay_chinh_thuc_tg_dcsvn");
        var datekn= "<?php echo date("d-m-Y",strtotime($model->ngay_chinh_thuc_tg_dcsvn));?>";
        if(datekn!=null)
        {
            kn.value=""+datekn;
        }


    }, false);

</script>