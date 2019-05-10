<?php

use yii\helpers\Html;
use frontend\models\Cau;
use frontend\models\Donvi;
use frontend\models\MucDoBaoTri;
use frontend\models\MucDoKiemTra;

/* @var $this yii\web\View */

$this->title = 'VEC-HỆ THỐNG QUẢN LÝ THÔNG TIN CẦU ĐƯỜNG BỘ';

$link = Yii::getAlias('@web/toandq/images');
//echo 'Link: '.$link;
?>

<style type="text/css">
    #map {
        height: 760px;
        width: 100%;
    }
    a {
        text-decoration: none;
    }
</style>
<script>
    function initMap() {

<?php
$i = 0;
if ($toado) {
    foreach ($toado as $list) {
        ?>
                var toandq<?= $i ?> = {
                    info: '<strong><?= $list->ten ?></strong><br>\Dài: <?= $list->chieudai ?> (m)<br>\Lý trình: Km<?= $list->kmchinh . '+' . $list->kmle ?><br>\<a href="<?= Yii::$app->homeUrl ?>cau/view?id=<?= $list->id_cau ?>">Xem chi tiết</a>',
                    lat: <?= $list->vido ?>,
                    long: <?= $list->kinhdo ?>
                };
        <?php
        $i += 1;
    }
}
?>

        var locations = [
<?php
$i = 0;
if ($toado) {
    foreach ($toado as $list) {
        ?>
                    [toandq<?= $i ?>.info, toandq<?= $i ?>.lat, toandq<?= $i ?>.long, <?= $i ?>],
        <?php
        $i+= 1;
    }
}
?>
        ];

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: new google.maps.LatLng(16.005500, 105.954321),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow({});

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }
</script>
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-road fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $count_tuyenduong ?></div>
                        <div>Tuyến đường</div>
                    </div>
                </div>
            </div>
            <a href="<?= Yii::$app->homeUrl ?>tuyenduong">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-map-marker fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $count_cau ?></div>
                        <div>Thông tin cầu</div>
                    </div>
                </div>
            </div>
            <a href="<?= Yii::$app->homeUrl ?>cau">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-lightbulb-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $count_kiemtra ?></div>
                        <div>Thông tin kiểm tra</div>
                    </div>
                </div>
            </div>
            <a href="<?= Yii::$app->homeUrl ?>/cau-kiemtra">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-edit fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $count_baotri ?></div>
                        <div>Thông tin bảo trì</div>
                    </div>
                </div>
            </div>
            <a href="<?= Yii::$app->homeUrl ?>/cau-baotri">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row" style="text-align:center;">
    <div class="col-lg-6">
        <div style="background: #aae2ff; color: #002a80; width: 100%; border-radius: 4px; margin-bottom: 2px; padding: 8px 15px; text-align: left;">
            Thông tin kiểm tra mới nhất
        </div>
        <div style="width: 100%">
            <?php
            if (count($kiemtra) == 0) {
                echo 'Không có thông tin.';
            } else {
                ?>
                <table class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr style="font-weight: bold">
                            <td style="text-align:center; vertical-align: middle; width: 20%;">Cầu</td>
                            <td style="text-align:center; vertical-align: middle; width: 20%;">Thời gian</td>
                            <td style="text-align:center; vertical-align: middle; width: 20%;">Mức độ kiểm tra</td>
                            <td style="text-align:center; vertical-align: middle; width: 20%;">Đơn vị thực hiện</td>
                            <td style="text-align:center; vertical-align: middle; width: 20%;">Tình trạng</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($kiemtra as $list) {
                            ?>
                            <tr>
                                <td style="text-align:center">
                                    <?= ($list->id_cau != 0 ? Cau::findOne($list->id_cau)->ten : '--') ?>
                                </td>
                                <td style="text-align:center">
                                    <?= Html::a(date_format(date_create($list->ngaykiemtra), 'd/m/Y'), ['cau-kiemtra/view', 'id' => $list->id_kiemtra]) ?>
                                </td>
                                <td style="text-align:center">
                                    <?= ($list->id_mucdokiemtra != 0 ? MucDoKiemTra::findOne($list->id_mucdokiemtra)->ten : '--') ?>
                                </td>
                                <td style="text-align:center">
                                    <?= ($list->id_donvikiemtra != 0 ? Donvi::findOne($list->id_donvikiemtra)->tenviettat : '--') ?>
                                </td>
                                <td style="text-align:center">
                                    <?php
                                    if ($list->cansuachua == 0) {
                                        echo Html::img('@web/toandq/images/icon-ok.png', ['alt'=>'Cầu tốt', 'title'=>'Cầu không cần bảo trì / sửa chữa', 'width'=>'20px']);
                                    } else if ($list->cansuachua == 1) {
                                        echo Html::a(Html::img('@web/toandq/images/icon-danger.png', ['alt'=>'Cầu hư hỏng', 'title'=>'Cầu cần bảo trì / sửa chữa', 'width'=>'20px']), ['cau-baotri/create', 'id_check' => $list->id_kiemtra, 'id_bridge' => $list->id_cau],['title' => 'Cập nhật thông tin bảo trì / sửa chữa']);
                                    } else {
                                        echo Html::img('@web/toandq/images/icon-danger-blue.png', ['alt'=>'Cầu đã được bảo trì / sửa chữa', 'title'=>'Cầu đã được bảo trì / sửa chữa', 'width'=>'20px']);
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
            }
            ?>
        </div>
        <div style="background: #aae2ff; color: #002a80; width: 100%; border-radius: 4px; margin-bottom: 2px; padding: 8px 15px; text-align: left;">
            Thông tin bảo trì mới nhất
        </div>
        <div style="width: 100%">
            <?php
            if (count($baotri) == 0) {
                echo 'Không có thông tin.';
            } else {
                ?>
                <table class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr style="font-weight: bold">
                            <td style="text-align:center; vertical-align: middle; width: 20%;">Cầu</td>
                            <td style="text-align:center; vertical-align: middle; width: 20%;">Thời gian</td>
                            <td style="text-align:center; vertical-align: middle; width: 20%;">Mức độ bảo trì</td>
                            <td style="text-align:center; vertical-align: middle; width: 20%;">Đơn vị thực hiện</td>
                            <td style="text-align:right; vertical-align: middle; width: 20%;">Kinh phí</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($baotri as $list) {
                            ?>
                            <tr>
                                <td style="text-align:center; vertical-align: middle; width: 20%;">
                                    <?= ($list->id_cau != 0 ? Cau::findOne($list->id_cau)->ten : '--') ?>
                                </td>
                                <td style="text-align:center">
                                    <?= Html::a(date_format(date_create($list->ngaybatdau), 'd/m/Y') . ' ÷ ' . date_format(date_create($list->ngayketthuc), 'd/m/Y'), ['cau-baotri/view', 'id' => $list->id_baotri]) ?>
                                </td>
                                <td style="text-align:center">
                                    <?= ($list->id_mucdobaotri != 0 ? MucDoBaoTri::findOne($list->id_mucdobaotri)->ten_mucdo : '--') ?>
                                </td>
                                <td style="text-align:center">
                                    <?= ($list->id_donvithuchien != 0 ? Donvi::findOne($list->id_donvithuchien)->tenviettat : '--') ?>
                                </td>
                                <td style="text-align:right"><?= number_format($list->giatri) ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div style="background: #aae2ff; color: #002a80; width: 100%; border-radius: 4px; margin-bottom: 2px; padding: 8px 15px;">
            Bản đồ cầu
        </div>
        <div style="width: 100%;">
            <div id="map"></div>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_s_hwbsUFWpSF8sPyIIsoxL6NKq3LAlE&callback=initMap&language=vi"></script>
        </div>
    </div>
</div>