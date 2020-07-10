<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Funtions */

$this->title = 'Update Funtions: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Funtions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->funtions_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="funtions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
