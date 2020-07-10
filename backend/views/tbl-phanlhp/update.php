<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblPhanlhp */

$this->title = 'Update Tbl Phanlhp: ' . $model->phanlop_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Phanlhps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->phanlop_id, 'url' => ['view', 'id' => $model->phanlop_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-phanlhp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
