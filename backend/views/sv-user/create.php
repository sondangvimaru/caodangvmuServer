<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SvUser */

$this->title = 'THÊM TÀI KHOẢN SINH VIÊN';
$this->params['breadcrumbs'][] = ['label' => 'QUẢN LÝ TÀI KHOẢN SINH VIÊN', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sv-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
