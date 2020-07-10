<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblDiem */

$this->title = 'Tạo Điểm';
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ ĐIỂM', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-diem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
