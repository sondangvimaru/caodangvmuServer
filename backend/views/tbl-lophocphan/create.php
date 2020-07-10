<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblLophocphan */

$this->title = 'THÊM LỚP HỌC PHẦN';
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ LỚP HỌC PHẦN', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-lophocphan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
