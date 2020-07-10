<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblNganh */

$this->title = 'THÊM NGÀNH';
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ NGÀNH', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-nganh-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
