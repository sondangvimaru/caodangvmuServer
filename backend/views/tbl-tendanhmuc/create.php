<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblTendanhmuc */

$this->title = 'THÊM DANH MỤC';
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ DANH MỤC', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-tendanhmuc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
