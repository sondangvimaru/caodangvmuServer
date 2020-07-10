<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
   
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            'style'=>'background:#82ccdd;font-family: "Times New Roman", Times, serif;font-weight:bold;color:white;'
        ],
    ]);
    $menuItems[] = [
        'label' => 'Quản lý sinh viên',
        'items'=>[['label'=>'Danh mục sinh viên','url'=>\yii\helpers\Url::toRoute(['tbl-sinhvien/index'])],
            ['label'=>'Danh mục khoa','url'=>\yii\helpers\Url::toRoute(['tbl-khoa/index'])],
            ['label'=>'Danh mục ngành','url'=>\yii\helpers\Url::toRoute(['tbl-nganh/index'])],
            ['label'=>'Danh mục lớp hành chính','url'=>\yii\helpers\Url::toRoute(['tbl-lophanhchinh/index'])],
            ['label'=>'Danh mục điểm','url'=>\yii\helpers\Url::toRoute(['tbl-diem/index'])],
            ['label' => 'Quản lý Phản hồi','url'=>"../../../caodangvmu/feedback/feedbackview.php"],
        ]
    ];
    $menuItems[] = [
        'label' => 'Quản lý đăng ký học phần',
        'items'=>[
            ['label'=>'Danh mục học phần','url'=>\yii\helpers\Url::toRoute(['tbl-hocphan/index'])],
            ['label'=>'Đợt đăng ký học phần','url'=>\yii\helpers\Url::toRoute(['tbl-dotdk/index'])],
            ['label'=>'Danh mục lớp học phần','url'=>\yii\helpers\Url::toRoute(['tbl-lophocphan/index'])],
            ['label'=>'Đăng ký học phần','url'=>\yii\helpers\Url::toRoute(['tbl-dangkyhocphan/index'])],
            ['label'=>'Lịch Thi','url'=>\yii\helpers\Url::toRoute(['tbl-lichthi/index'])],
        ]
    ];
    $menuItems[] = [
        'label' => 'Quản lý Tin tức',
        'items'=>[
            ['label'=>'Bài viết','url'=>\yii\helpers\Url::toRoute(['tbl-baidang/index'])],
            ['label'=>'Danh mục','url'=>\yii\helpers\Url::toRoute(['tbl-tendanhmuc/index'])],
            ['label'=>'Quản lý Thông báo','url'=>\yii\helpers\Url::toRoute(['tbl-thongbao/index'])],
            ['label'=>'Lịch Thi','url'=>\yii\helpers\Url::toRoute(['tbl-lichthi/index'])],
        ]
    ];

    $menuItems[] = [
        'label' => 'Quản lý Tài khoản',
        'items'=>[
            ['label'=>'Quản lý tài khoản sinh viên','url'=>\yii\helpers\Url::toRoute(['sv-user/index'])],
            ['label'=>'Quản lý tài khoản quản trị viên','url'=>\yii\helpers\Url::toRoute(['admin-user/index'])],
        ]
    ];

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
   if(!Yii::$app->user->isGuest)
   {
       echo Nav::widget([
           'options' => ['class' => 'navbar-nav navbar-right'],
           'items' => $menuItems,
       ]);
   }
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
