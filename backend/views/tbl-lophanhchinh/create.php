<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblLophanhchinh */

$this->title = 'Thêm lớp hành chính';
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ LỚP HÀNH CHÍNH', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-lophanhchinh-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
