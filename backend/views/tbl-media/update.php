<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblMedia */

$this->title = 'Update Tbl Media: ' . $model->media_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->media_id, 'url' => ['view', 'id' => $model->media_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-media-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
