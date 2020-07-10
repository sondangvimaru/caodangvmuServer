<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblDangkyhocphan */

$this->title = 'Đăng ký học phần';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý đăng ký học phần', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-dangkyhocphan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
