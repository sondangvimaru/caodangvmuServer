<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblDotdk */

$this->title = 'THÊM ĐỢT ĐĂNG KÝ HỌC PHẦN';
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ ĐỢT ĐĂNG KÝ HỌC PHẦN', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-dotdk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
