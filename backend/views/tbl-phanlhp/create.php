<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblPhanlhp */

$this->title = 'Create Tbl Phanlhp';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Phanlhps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-phanlhp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
