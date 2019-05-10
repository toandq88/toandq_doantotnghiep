<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="<?= Yii::getAlias('@web') ?>/favicon.ico" type="image/x-icon" />

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>"><?= Yii::$app->name ?></a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= Yii::$app->user->identity->name ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <?=
                                Html::a('<i class="fa fa-fw fa-gear"></i> Cá nhân', ['/user/view?id=' . Yii::$app->user->identity->id], ['class' => 'profile-link'])
                                ?>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <?=
                                Html::a('<i class="fa fa-fw fa-power-off"></i> Thoát', ['/site/logout'], ['class' => 'profile-link'])
                                ?>
                            </li>
                        </ul>
                    </li>
                </ul>


                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active" style="border-top: 1px solid #fff;">
                            <a href="<?= Yii::$app->homeUrl ?>"><i class="fa fa-fw fa-dashboard"></i> BẢNG ĐIỀU KHIỂN</a>
                        </li>
                        <li style="border-top: 1px solid #076cf4;">
                            <?= Html::a('<i class="glyphicon glyphicon-road"></i> Thông tin tuyến đường', ['tuyenduong/index', 'id' => null], ['class' => '']) ?>
                        </li>
                        <li style="border-top: 1px solid #076cf4;">
                            <a href="#" data-toggle="collapse" data-target="#demo1"><i class="fa fa-map-marker"></i> Thông tin cầu</a>
                            <ul id="demo1" class="collapse">
                                <li>
                                    <?= Html::a('Thông tin chính về cầu', ['cau/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <!-- li>
                                <?= Html::a('Cắt ngang mặt cầu', ['cau-catngangmatcau/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                <?= Html::a('Kết cấu nhịp', ['cau-ketcaunhip/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                <?= Html::a('Kết cấu dưới - mố', ['cau-ketcauduoi-mo/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                <?= Html::a('Kết cấu dưới - trụ', ['cau-ketcauduoi-tru/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                <?= Html::a('Gối cầu', ['cau-goicau/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                <?= Html::a('Khe co giãn', ['cau-khecogian/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                <?= Html::a('Kè bảo vệ cầu', ['cau-kebaove/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                <?= Html::a('Thiết bị công cộng trên cầu', ['cau-thietbicongcongtrencau/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                <?= Html::a('Thông tin dự ứng lực', ['cau-thongtinduungluc/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                <?= Html::a('Chống thấm và thoát nước', ['cau-chongthamvathoatnuoc/index', 'id' => null], ['class' => '']) ?>
                                </li -->
                                <li>
                                    <?= Html::a('Lịch sử cầu', ['cau-lichsu/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                    <?= Html::a('Hình ảnh', ['cau-hinhanh/index', 'id' => null], ['class' => '']) ?>
                                </li>
                            </ul>
                        </li>
                        <li style="border-top: 1px solid #076cf4;">
                            <?= Html::a('<i class="fa fa-lightbulb-o"></i> Thông tin kiểm tra cầu', ['cau-kiemtra/index', 'id' => null], ['class' => '']) ?>
                            <!--a href="#" data-toggle="collapse" data-target="#demo2"><i class="fa fa-lightbulb-o"></i> Kiểm tra cầu</a>
                            <ul id="demo2" class="collapse">
                                <li>
                            <?= Html::a('Thông tin kiểm tra cầu', ['cau-kiemtra/index', 'id' => null], ['class' => '']) ?>
                                </li>
                            </ul -->
                        </li>
                        <li style="border-top: 1px solid #076cf4;">
                            <?= Html::a('<i class="fa fa-edit"></i> Thông tin bảo trì cầu', ['cau-baotri/index', 'id' => null], ['class' => '']) ?>
                            <!-- a href="#" data-toggle="collapse" data-target="#demo3"><i class="fa fa-edit"></i> Bảo trì cầu</a>
                            <ul id="demo3" class="collapse">
                                <li>
                            <?= Html::a('Thông tin bảo trì cầu', ['cau-baotri/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                
                            </ul -->
                        </li>
                        <li style="border-top: 1px solid #076cf4;">
                            <a href="#" data-toggle="collapse" data-target="#demo4"><i class="glyphicon glyphicon-list-alt"></i> Báo cáo <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo4" class="collapse">
                                <li>
                                    <?= Html::a('Danh sách cầu', ['cau/export', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                    <?= Html::a('Thông tin kiểm tra cầu', ['cau-kiemtra/export', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                    <?= Html::a('Thông tin bảo trì cầu', ['cau-baotri/export', 'id' => null], ['class' => '']) ?>
                                </li>
                            </ul>
                        </li>
                        <li style="border-top: 1px solid #076cf4;">
                            <a href="#" data-toggle="collapse" data-target="#demo5"><i class="fa fa-gear"></i> Quản lý chung <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo5" class="collapse">
                                <li>
                                    <?= Html::a('Đơn vị', ['donvi/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                    <?= Html::a('Người dùng', ['user/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                    <?= Html::a('Tỉnh / Thành phố', ['vn-tinh/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                    <?= Html::a('Quận / Huyện', ['vn-huyen/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                    <?= Html::a('Xã / Phường', ['vn-xa/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                    <?= Html::a('Cầu - Thông tin chung', ['cau-thongtinchung/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                    <?= Html::a('Mức độ kiểm tra', ['muc-do-kiem-tra/index', 'id' => null], ['class' => '']) ?>
                                </li>
                                <li>
                                    <?= Html::a('Mức độ bảo trì', ['muc-do-bao-tri/index', 'id' => null], ['class' => '']) ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <?=
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- jQuery Version 1.11.0 -->
        <script src="<?= Yii::getAlias('@web') . '/toandq/js/jquery-1.11.0.js' ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= Yii::getAlias('@web') . '/toandq/js/bootstrap.min.js' ?>"></script>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
