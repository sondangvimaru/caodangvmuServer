<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblBaidang */

$this->title = 'THÊM BÀI';
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ BÀI ĐĂNG', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-baidang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
