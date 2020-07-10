<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblPhanlhp\TblFeedback */

$this->title = 'Create Tbl Feedback';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Feedbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-feedback-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
