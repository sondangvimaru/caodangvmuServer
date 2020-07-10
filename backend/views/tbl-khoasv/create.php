<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblPhanlhp\TblKhoasv */

$this->title = 'Create Tbl Khoasv';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Khoasvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-khoasv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
