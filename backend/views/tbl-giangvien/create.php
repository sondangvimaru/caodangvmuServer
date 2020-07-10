<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblGiangvien */

$this->title = 'Thêm giảng viên';
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ GIẢNG VIÊN', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-giangvien-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
