<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblThongbao */

$this->title = 'THÊM THÔNG BÁO';
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ THÔNG BÁO', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-thongbao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
