<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblLichthi */

$this->title = 'THÊM LỊCH THI';
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ LỊCH THI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-lichthi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
