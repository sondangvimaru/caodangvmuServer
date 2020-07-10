<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblHocphan */

$this->title = 'Thêm học phần';
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ HỌC PHẦN', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-hocphan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
