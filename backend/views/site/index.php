<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Chào mừng trở lại <?php echo Yii::$app->user->identity->getAuthKey() ;?></h1>


    </div>

    <div style="text-align: center">
    <img src="../../../caodangvmu/images/vmu.png" style="text-align: center" width="300px" height="300px">


    </div>
</div>
