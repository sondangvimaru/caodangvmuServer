<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblDantoc */

$this->title = 'THÊM DÂN TỘC';
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ DANH MỤC DÂN TỘC', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-dantoc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
