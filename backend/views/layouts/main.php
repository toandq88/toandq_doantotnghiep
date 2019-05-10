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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <title><?= Html::encode($this->title) ?></title>
    
    <!-- Bootstrap Core CSS -->
    <link href="<?= Yii::getAlias('@web').'/toandq/css/bootstrap.min.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= Yii::getAlias('@web').'/toandq/css/sb-admin.css'?>" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="<?= Yii::getAlias('@web').'/toandq/css/plugins/morris.css'?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?= Yii::getAlias('@web').'/toandq/font-awesome-4.1.0/css/font-awesome.min.css'?>" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    <!-- File jquery -->
    <script type="text/javascript" src="<?= Yii::$app->homeUrl.'js/jquery-1.4.js'?>"></script> 
</head>
<body>
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
                <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>"><?=Yii::$app->name?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Toan <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href=""><i class="fa fa-fw fa-gear"></i> Cá nhân</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href=""><i class="fa fa-fw fa-power-off"></i> Thoát</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active" style="border-top: 1px solid #fff;">
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i> BẢNG ĐIỀU KHIỂN</a>
                    </li>
                    <li style="border-top: 1px solid #076cf4;">
                        <a href="#"><i class="glyphicon glyphicon-road"></i> Thông tin ban đầu</a>
                    </li>
                    <li style="border-top: 1px solid #076cf4;">
                        <a href="#"><i class="glyphicon glyphicon-check"></i> Thông tin vận hành</a>
                    </li>
                    <li style="border-top: 1px solid #076cf4;">
                        <a href="#"><i class="fa fa-edit"></i> Thông tin bảo trì</a>
                    </li>
                    <li style="border-top: 1px solid #076cf4;">
                        <a href="#" data-toggle="collapse" data-target="#demo"><i class="glyphicon glyphicon-list-alt"></i> Báo cáo <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Báo cáo 1</a>
                            </li>
                            <li>
                                <a href="#">Báo cáo 2</a>
                            </li>
                            <li>
                                <a href="#">Báo cáo 3</a>
                            </li>
                        </ul>
                    </li>
                    <li style="border-top: 1px solid #076cf4;">
                        <a href="#" data-toggle="collapse" data-target="#demo2"><i class="fa fa-gear"></i> Quản lý <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="">Dự án</a>
                            </li>
                            <li>
                                <?= Html::a('Đơn vị', ['donvi/index', 'id' => null], ['class' => '']) ?>
                            </li>
                            <li>
                                <?= Html::a('Nhân sự', ['nhansu/index', 'id' => null], ['class' => '']) ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
		<?= $content?>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="<?= Yii::getAlias('@web').'/toandq/js/jquery-1.11.0.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= Yii::getAlias('@web').'/toandq/js/bootstrap.min.js'?>"></script>


</body>
</html>
<?php $this->endPage() ?>
