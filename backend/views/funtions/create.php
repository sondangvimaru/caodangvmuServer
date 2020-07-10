<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Funtions */

$this->title = 'Create Funtions';
$this->params['breadcrumbs'][] = ['label' => 'Funtions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funtions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
