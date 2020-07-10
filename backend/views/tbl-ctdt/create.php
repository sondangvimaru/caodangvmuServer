<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblPhanlhp\TblCtdt */

$this->title = 'Create Tbl Ctdt';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Ctdts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-ctdt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
