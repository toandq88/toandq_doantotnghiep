<?php

use yii\helpers\Html;
use frontend\models\CauThongtinchung;
use frontend\models\Donvi;
use frontend\models\MucDoKiemTra;

//use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cau */

$this->title = $model->ten;
$this->params['breadcrumbs'][] = ['label' => 'Thông tin cầu đường bộ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$kinhdo = $model->kinhdo;
$vido = $model->vido;

$this->registerCssFile(Yii::$app->homeUrl . '/toandq/css/w3-slideshow.css');
$this->registerCssFile(Yii::$app->homeUrl . '/toandq/css/menu_fixtop.css');
?>
<div class="row">
    <div class="col-lg-6">
        <h4><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="col-lg-6" style="float: right; text-align: right">
        <?php
        if ($c_sum == 0) {     //nếu không có thông tin con thì cho phép xóa
            echo Html::a(' ', ['delete', 'id' => $model->id_cau], [
                    'class' => 'glyphicon glyphicon-trash btn btn-danger',
                    'data' => [
                        'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                        'method' => 'post',
                    ],
                ]);
        }
        ?>
        <?= Html::a('PDF <i class="fa fa-file-pdf-o" style="font-size:24px; color:red"></i>', ['pdf', 'id' => $model->id_cau],['target' => '_blank', 'style'=>'text-align: right;']) ?>
    </div>
</div>

<div class="navbar-2" style="display: none;">
    <a href="#thongtinchung">#Thông tin chung</a>
    <a href="#catngangmatcau">#Cắt ngang mặt cầu</a>
    <a href="#tinhkhongvabienbao">#Tĩnh không và biển báo</a>
    <a href="#dacdiemdongchay">#Đặc điểm dòng chảy</a>
    <a href="#ketcaunhip">#Kết cấu nhịp</a>
    <a href="#ketcauduoi">#Kết cấu dưới</a>
    <a href="#goicau">#Gối cầu</a>
    <a href="#khecogian">#Khe co giãn</a>
    <a href="#kebaove">#Kè bảo vệ</a>
    <a href="#thietbicongcong">#Thiết bị công cộng</a>
    <a href="#thongtinduungluc">#Thông tin dự ứng lực</a>
    <a href="#chongthamvathoatnuoc">#Chống thấm và thoát nước</a>
    <a href="#lichsusuachua">#Lịch sử sửa chữa</a>
    <a href="#lichsukiemtra">#Lịch sử kiểm tra</a>
    <a href="#hosoanh">#Hồ sơ ảnh</a>
    <a href="#bando">#Bản đồ</a>
</div>

<div class="row block_content" id="thongtinchung">
    I. THÔNG TIN CHUNG
    <span style="text-align: right; float: right; color: #009">
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['cau/update', 'id' => $model->id_cau]) ?>
    </span>
</div>
<div class="row">
    <div class="col-lg-4">Thuộc tuyến đường: <span class="chudam"><?= $model->tuyenduong->tenduong ?></span></div>
    <div class="col-lg-4">Số hiệu:
        <span class="chudam">
            <?php
            if ($model->sohieu != '') {
                echo $model->sohieu;
            } else {
                echo '---';
            }
            ?>
        </span>
    </div>
    <div class="col-lg-4">Đối tượng vượt: <span class="chudam"><?= $model->loaidoituongvuot->ten ?></span></div>
</div>
<div class="row" style="padding-top: 20px;">
    <div class="col-lg-4">Tên sông suối: 
        <span class="chudam">
            <?php
            if ($model->tensongsuoi != '') {
                echo $model->tensongsuoi;
            } else {
                echo '---';
            }
            ?>
        </span>
    </div>
    <div class="col-lg-4">Góc giao: 
        <span class="chudam">
            <?php
            if ($model->gocgiao != 0) {
                echo $model->gocgiao . '<sup>0</sup>';
            } else {
                echo '---';
            }
            ?>
        </span>
    </div>
    <div class="col-lg-4">Lý trình: <span class="chudam">Km<?= $model->kmchinh . ' + ' . $model->kmle ?></span></div>
</div>
<div class="row" style="padding-top: 20px;">
    <div class="col-lg-4">Tọa độ: <span class="chudam"><?= 'N' . $model->vido . ' / E' . $model->kinhdo ?></span></div>
    <div class="col-lg-4">Địa phận: <span class="chudam"><?= @$model->vntinh->ten . ' / ' . @$model->vnhuyen->ten . ' / ' . @$model->vnxa->ten ?></span></div>
    <div class="col-lg-4">Loại làn đường: <span class="chudam">
            <?php
            if ($model->loailanduong == 1) {
                echo 'Phải tuyến';
            } else if ($model->loailanduong == 2) {
                echo 'Trái tuyến';
            } else {
                echo 'Cả phải tuyến và trái tuyến';
            }
            ?>
        </span>
    </div>
</div>
<div class="row" style="padding-top: 20px;">
    <div class="col-lg-4">Dạng cầu: <span class="chudam"><?= ($model->loaidangcau ? $model->loaidangcau->ten : '--') ?></span></div>
    <div class="col-lg-4">Chiều dài: <span class="chudam"><?= $model->chieudai ?></span> (m)</div>
    <div class="col-lg-4">Số nhịp: <span class="chudam"><?= $model->sonhip ?></span></div>
</div>
<div class="row" style="padding-top: 20px;">
    <div class="col-lg-4">Sơ đồ nhịp (Ln): <span class="chudam"><?= $model->sodonhip ?></span></div>
    <div class="col-lg-4">Bề rộng cầu: <span class="chudam"><?= $model->berongcau ?></span> (m)</div>
    <div class="col-lg-4">Bề rộng phần xe chạy: <span class="chudam"><?= $model->berongphanxechay ?></span> (m)</div>
</div>
<div class="row" style="padding-top: 20px;">
    <div class="col-lg-4">Bề rộng phần bộ hành: <span class="chudam"><?= $model->berongphanbohanh ?></span> (m)</div>
    <div class="col-lg-4">Tải trọng thiết kế: <span class="chudam"><?= ($model->loaitaitrongthietke ? $model->loaitaitrongthietke->ten : '--') ?></span></div>
    <div class="col-lg-4">Tải trọng khai thác: <span class="chudam"><?= $model->taitrongkhaithac ?></span> (tấn)</div>
</div>
<div class="row" style="padding-top: 20px;">
    <div class="col-lg-4">Quy trình thiết kế: <span class="chudam"><?= ($model->loaiquytrinhthietke ? $model->loaiquytrinhthietke->ten : '--') ?></span></div>
    <div class="col-lg-4">Năm xây dựng: <span class="chudam"><?= $model->namxaydung ?></span></div>
    <div class="col-lg-4">Năm đưa vào khai thác: <span class="chudam"><?= $model->namduavaokhaithac ?></span></div>
</div>
<div class="row" style="padding-top: 20px;">
    <div class="col-lg-4">Chạy chung với đường sắt: 
        <span class="chudam">
            <?php
            if ($model->chaychungvoi_duongsat == 1) {
                echo 'Có';
            } else {
                echo 'Không';
            }
            ?>
        </span>
    </div>
    <div class="col-lg-4">Chạy chung với công trình thủy lợi: 
        <span class="chudam">
            <?php
            if ($model->chaychungvoi_congtrinhthuyloi == 1) {
                echo 'Có';
            } else {
                echo 'Không';
            }
            ?>
        </span>
    </div>
    <div class="col-lg-4">Đ.vị XD: <span class="chudam"><?= $model->donvixaydungcau ?></span></div>
</div>
<div class="row" style="padding-top: 20px">
    <div class="col-lg-12"><span style="font-weight: bold;">Ghi chú về lịch sử cầu: </span>
        <?php
        if (count($lists_lichsu) > 0) {
            foreach ($lists_lichsu as $list) {
                echo '<p> <i> - Ngày ' . date_format(date_create($list->ngaythangnam), 'd/m/Y') . ':</i> ' . $list['noidung'] . '</p>';
            }
        } else {
            echo '--';
        }
        ?>
    </div>
</div>
<div class="row" style="text-align: center">
    <?php
    $i =  1;
    if($lists_hinhanh_doc)
    {
    ?>
        <img src="<?= Yii::$app->homeUrl . '/uploads/images/cau/' . $lists_hinhanh_doc->file ?>" style="width:60%;"> 
        <p>Hình <?=$i?>: Sơ họa cắt dọc cầu</p>
    <?php
    $i +=  1;
    }

    if($lists_hinhanh_ngang)
    {
    ?>
        <img src="<?= Yii::$app->homeUrl . '/uploads/images/cau/' . $lists_hinhanh_ngang->file ?>" style="width:60%;"> 
        <p>Hình <?=$i?>: Sơ họa cắt ngang cầu</p>
    <?php
    }
    ?>
</div>

<div class="row block_content" id="catngangmatcau">
    II. CẮT NGANG MẶT CẦU 
    <span style="text-align: right; float: right; color: #009">
        <?= Html::a('#Thêm mới', ['cau-catngangmatcau/create', 'id_bridge' => $model->id_cau]) ?>
    </span>
</div>
<div class="row">
    <?php
    if (count($lists_catngangmatcau) == 0) {
        echo 'Không có thông tin';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 98%">
            <thead>
                <tr>
                    <td class="table_cont" style="width:13%" rowspan="2">Các nhịp cùng dạng</td>
                    <td class="table_cont" style="width:12%" rowspan="2">Chiều rộng toàn cầu</td>
                    <td class="table_cont" style="width:25%" colspan="2">Phần xe chạy</td>
                    <td class="table_cont" style="width:25%" colspan="2">Phân cách</td>
                    <td class="table_cont" style="width:20%" colspan="2">Đường bộ hành, lan can (1 bên)</td>
                    <td class="table_cont" style="width:5%" rowspan="2">#</td>
                </tr>
                <tr>
                    <td class="table_cont" style="width:13%;">Tổng chiều rộng</td>
                    <td class="table_cont" style="width:12%;">Số làn xe</td>
                    <td class="table_cont" style="width:13%;">Bề rộng phân cách giữa</td>
                    <td class="table_cont" style="width:12%;">Bề rộng 1 bên phân cách biên</td>
                    <td class="table_cont" style="width:10%;">Bề rộng đường bộ hành</td>
                    <td class="table_cont" style="width:10%;">Bề rộng lan can</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($lists_catngangmatcau as $list) {
                    if ($i % 2 == 0) {
                        $back = '#fff';
                    } else {
                        $back = '#f9f9f9';
                    }
                    $i++;
                    ?>
                    <tr>
                        <td class="table_cont" style="background: <?= $back ?>;"><?= $list['nhipcungdang'] ?> </td>
                        <td class="table_cont" style="background: <?= $back ?>;"><?= $list['chieurongtoancau'] ?> (m) </td>
                        <td class="table_cont" style="background: <?= $back ?>;"><?= $list['phanxechay_chieurong'] ?> (m) </td>
                        <td class="table_cont" style="background: <?= $back ?>;"><?= $list['phanxechay_solanxe'] ?></td>
                        <td class="table_cont" style="background: <?= $back ?>;"><?= $list['phancach_berongphancachgiua'] ?> (m) </td>
                        <td class="table_cont" style="background: <?= $back ?>;"><?= $list['phancach_berongphancachbien'] ?> (m) </td>
                        <td class="table_cont" style="background: <?= $back ?>;"><?= $list['duongbohanh_berong'] ?> (m) </td>
                        <td class="table_cont" style="background: <?= $back ?>;"><?= $list['duongbohanh_beronglancan'] ?> (m)</td>
                        <td class="table_cont" style="background: <?= $back ?>;">
                            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['cau-catngangmatcau/update', 'id' => $list->id_catngangmatcau]) ?>
                            <?=
                            Html::a('<i class="glyphicon glyphicon-trash"></i>', ['cau-catngangmatcau/delete', 'id' => $list->id_catngangmatcau], [
                                'data' => [
                                    'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                                    'method' => 'post',
                                ],
                            ])
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

<div class="row block_content" id="tinhkhongvabienbao">
    III. TĨNH KHÔNG VÀ BIỂN BÁO
    <span style="text-align: right; float: right; color: #009">
        #
    </span>
</div>
<div class="row">
    <div class="col-lg-12" style="margin: -10px 0px 10px 0px"><span class="chudam">Tĩnh không dưới cầu:</span></div>
    <div class="col-lg-3">Về mùa khô (H<sub>max</sub>): <span class="chudam"><?= $model->tinhkhong_vemuakho ?></span> (m)</div>
    <div class="col-lg-3">Về mùa lũ (H<sub>min</sub>): <span class="chudam"><?= $model->tinhkhong_vemualu ?></span> (m)</div>
    <div class="col-lg-3">Cố định: <span class="chudam"><?= $model->tinhkhong_codinh ?></span> (m)</div>
    <div class="col-lg-3">Thông thuyền: <span class="chudam"><?= $model->tinhkhong_thongthuyen ?></span> (m)</div>
    <div class="col-lg-12" style="margin: 10px 0px 20px 0px;"><span class="chudam">Tĩnh không trên cầu: <?= $model->tinhkhong_trencau ?> </span>(m)</div>
</div>
<div class="row">    
    <div class="col-lg-12" style="margin: -10px 0px 10px 0px"><span class="chudam">Biển báo:</span></div>
    <div class="col-lg-3">Có biển tên cầu: <span class="chudam"><?= ($model->bienbao_tencau ? 'Có' : 'Không') ?></span></div>
    <div class="col-lg-3">Có biển tải trọng: <span class="chudam"><?= ($model->bienbao_taitrong != 0 ? $model->bienbao_taitrong . ' (T)' : 'Không') ?></span></div>
    <div class="col-lg-3">Có biển hạn chế tốc độ: <span class="chudam"><?= ($model->bienbao_tocdo != 0 ? $model->bienbao_tocdo . ' (km/h)' : 'Không') ?></span></div>
    <div class="col-lg-3">Có biển khống chế cự ly xe: <span class="chudam"><?= ($model->bienbao_culyxe != 0 ? $model->bienbao_culyxe . ' (m)' : 'Không') ?></span></div>
</div>
<div class="row" style="padding-top: 20px;">
    <div class="col-lg-3">Có biển hạn chế chiều cao: <span class="chudam"><?= ($model->bienbao_chieucao != 0 ? $model->bienbao_chieucao . ' (m)' : 'Không') ?></span></div>
    <div class="col-lg-3">Có biển hạn chế chiều rộng: <span class="chudam"><?= ($model->bienbao_chieurong != 0 ? $model->bienbao_chieurong . ' (T)' : 'Không') ?></span></div>
    <div class="col-lg-6">Các biển báo khác: <span class="chudam"><?= ($model->bienbao_khac != '' ? $model->bienbao_khac : '--') ?></span></div>
</div>

<div class="row block_content" id="dacdiemdongchay">
    IV. MỘT SỐ ĐẶC ĐIỂM DÒNG CHẢY
    <span style="text-align: right; float: right; color: #009">
        #
    </span>
</div>
<div class="row">    
    <div class="col-lg-4">Bị ảnh hưởng của thủy triều: <span class="chudam"><?= ($model->dongchay_thuytrieu != 0 ? 'Có' : 'Không') ?></span></div>
    <div class="col-lg-4">Biên độ thủy triều: <span class="chudam"><?= ($model->dongchay_thuytrieu != 0 ? $model->dongchay_thuytrieu . ' (m)' : 'Không') ?></span></div>
    <div class="col-lg-4">Sông bị nhiễm mặn: <span class="chudam"><?= ($model->dongchay_nhiemman ? 'Có' : 'Không') ?></span></div>
</div>
<div class="row" style="padding-top: 10px">    
    <div class="col-lg-4">Bị ảnh hưởng của lũ lụt: <span class="chudam"><?= ($model->dongchay_lulut ? 'Có' : 'Không') ?></span></div>
    <div class="col-lg-4">Sông có thông thuyền: <span class="chudam"><?= ($model->dongchay_thongthuyen ? 'Có' : 'Không') ?></span></div>
    <div class="col-lg-4">Cấp sông: <span class="chudam"><?= ($model->dongchay_capsong ? $model->dongchay_capsong : '--') ?></span></div>
</div>
<div class="row" style="padding-top: 10px">    
    <div class="col-lg-12">Thời kỳ lũ: <?= ($model->dongchay_thoikylu ? $model->dongchay_thoikylu : '--') ?></span></div>
</div>

<div class="row block_content" id="ketcaunhip">
    V. KẾT CẤU NHỊP
    <span style="text-align: right; float: right; color: #009">
        <?= Html::a('#Thêm mới', ['cau-ketcaunhip/create', 'id_bridge' => $model->id_cau]) ?>
    </span>
</div>
<div class="row">
    <?php
    if (count($lists_ketcaunhip) == 0) {
        echo 'Không có thông tin';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 98%">
            <tr>
                <td style="background-color:#fff;">
                    <table cellspacing="0" cellpadding="0" width="100%">
                        <?php
                        foreach ($lists_ketcaunhip as $list) {
                            $doccau_sodoketcau = @CauThongtinchung::findOne($list->doccau_sodoketcau)->ten;
                            $doccau_dangketcau = @CauThongtinchung::findOne($list->doccau_dangketcau)->ten;
                            $doccau_loaivuot = @CauThongtinchung::findOne($list->doccau_loaivuot)->ten;
                            $doccau_loaimatduongtrencau = @CauThongtinchung::findOne($list->doccau_loaimatduongtrencau)->ten;
                            $doccau_vatlieuduongbohanh = @CauThongtinchung::findOne($list->doccau_vatlieuduongbohanh)->ten;
                            $doccau_vatlieulancantayvin = @CauThongtinchung::findOne($list->doccau_vatlieulancantayvin)->ten;

                            $ngangcau_dangdamchu = @CauThongtinchung::findOne($list->ngangcau_dangdamchu)->ten;
                            $ngangcau_dangdamngang = @CauThongtinchung::findOne($list->ngangcau_dangdamngang)->ten;
                            $ngangcau_loaibanmatcau = @CauThongtinchung::findOne($list->ngangcau_loaibanmatcau)->ten;
                            $ngangcau_dangketcauvom = @CauThongtinchung::findOne($list->ngangcau_dangketcauvom)->ten;
                            ?>
                            <tr style="height: 26px; background: #f9f9f9">
                                <td colspan="4" style="font-weight: bold; text-align: left; padding-left: 50px;">Ký hiệu nhịp: <?= $list['kyhieunhip'] ?>
                                    <span style="text-align: right; float: right;">
                                        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['cau-ketcaunhip/update', 'id' => $list->id_ketcaunhip]) ?>
                                        <?=
                                        Html::a('<i class="glyphicon glyphicon-trash"></i>', ['cau-ketcaunhip/delete', 'id' => $list->id_ketcaunhip], [
                                            'data' => [
                                                'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                                                'method' => 'post',
                                            ],
                                        ])
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr style="height: 26px;">
                                <td colspan="2" style="font-weight: bold; text-align: center">Dọc cầu</td>
                                <td colspan="2" style="font-weight: bold; text-align: center">Ngang cầu</td>
                            </tr>
                            <tr style="height: 26px;">
                                <td class="ketcaunhip_left">Sơ đồ kết cấu:</td>
                                <td class="ketcaunhip_right"><?= $doccau_sodoketcau ?></td>
                                <td class="ketcaunhip_left">Dạng dầm chủ:</td>
                                <td class="ketcaunhip_right"><?= $ngangcau_dangdamchu ?></td>
                            </tr>
                            <tr style="height: 26px;">
                                <td class="ketcaunhip_left">Dạng kết cấu:</td>
                                <td class="ketcaunhip_right"><?= $doccau_dangketcau ?></td>
                                <td class="ketcaunhip_left">Số dầm chủ:</td>
                                <td class="ketcaunhip_right"><?= $list['ngangcau_sodamchu'] ?></td>
                            </tr>
                            <tr style="height: 26px;">
                                <td class="ketcaunhip_left">Chiều dài nhịp:</td>
                                <td class="ketcaunhip_right"><?= $list['doccau_chieudainhip'] ?> (m)</td>
                                <td class="ketcaunhip_left">Cự ly dầm @:</td>
                                <td class="ketcaunhip_right"><?= $list['ngangcau_culydam'] ?> (m)</td>
                            </tr>
                            <tr style="height: 26px;">
                                <td class="ketcaunhip_left">Cự ly tim gối:</td>
                                <td class="ketcaunhip_right"><?= $list['doccau_culytimgoi'] ?> (m)</td>
                                <td class="ketcaunhip_left">Chiều cao dầm chủ:</td>
                                <td class="ketcaunhip_right"><?= number_format($list['ngangcau_chieucaodamchu']) ?> (mm)</td>
                            </tr>
                            <tr style="height: 26px;">
                                <td class="ketcaunhip_left">Loại vượt:</td>
                                <td class="ketcaunhip_right"><?= $doccau_loaivuot ?></td>
                                <td class="ketcaunhip_left">Dạng dầm ngang:</td>
                                <td class="ketcaunhip_right"><?= $ngangcau_dangdamngang ?></td>
                            </tr>
                            <tr style="height: 26px;">
                                <td class="ketcaunhip_left">Loại mặt đường trên cầu:</td>
                                <td class="ketcaunhip_right"><?= $doccau_loaimatduongtrencau ?></td>
                                <td class="ketcaunhip_left">Dạng dầm dọc phụ:</td>
                                <td class="ketcaunhip_right"><?= $list['ngangcau_dangdamdocphu'] ?></td>
                            </tr>
                            <tr style="height: 26px;">
                                <td class="ketcaunhip_left">V.liệu đường bộ hành:</td>
                                <td class="ketcaunhip_right"><?= $doccau_vatlieuduongbohanh ?></td>
                                <td class="ketcaunhip_left">Loại bản mặt cầu:</td>
                                <td class="ketcaunhip_right"><?= $ngangcau_loaibanmatcau ?></td>
                            </tr>
                            <tr style="height: 26px;">
                                <td class="ketcaunhip_left">V.liệu lan can tay vịn:</td>
                                <td class="ketcaunhip_right"><?= $doccau_vatlieulancantayvin ?></td>
                                <td class="ketcaunhip_left">Dạng kết cấu vòm:</td>
                                <td class="ketcaunhip_right"><?= $ngangcau_dangketcauvom ?></td>
                            </tr>
                            <tr style="height: 10px;">
                                <td colspan="4"></td>
                            </tr>
                            <?php
                            if ($list->file != '') {
                                ?>
                                <tr style="height: 15px;">
                                    <td colspan="4" style="text-align: center">
                                        Sơ họa cắt ngang KCN<br/>
                                        <img style="max-width: 800px; max-height: 400px;" src="<?= Yii::$app->homeUrl . 'uploads/images/cau-ketcaunhip/' . $list->file ?>"/>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </td>
            </tr>
        </table>
        <?php
    }
    ?>
</div>

<div class="row block_content" id="ketcauduoi">
    VI. KẾT CẤU DƯỚI
    <span style="text-align: right; float: right; color: #009">
        #
    </span>
</div>
<div class="row">
    <table class="table table-striped table-bordered" style="width: 98%">
        <tr style="height:30px;">
            <td style="height: 26px; background: #f9f9f9">
                1. Kết cấu mố
                <span style="text-align: right; float: right; color: #009">
                    <?= Html::a('#Thêm mới', ['cau-ketcauduoi-mo/create', 'id_bridge' => $model->id_cau]) ?>
                </span>
            </td>
        </tr>
        <?php
        if (count($lists_ketcauduoi_mo) == 0) {
            echo '<tr style="height:30px;"><td style="background:#fff;">Không có thông tin</td></tr>';
        } else {
            ?>
            <tr style="height:30px;">
                <td>
                    <table cellspacing="1" cellpadding="1" width="100%">
                        <tr style="background: #e0fffe; height: 30px;">
                            <td rowspan="2" style="width: 10%; text-align: center; vertical-align: middle;">Ký hiệu</td>
                            <td rowspan="2" style="width: 10%; text-align: center; vertical-align: middle;">Phía</td>
                            <td colspan="4" style="width: 41%; text-align: center; vertical-align: middle;">Thân mố</td>
                            <td colspan="2" style="width: 22%; text-align: center; vertical-align: middle;">Móng mố</td>
                            <td rowspan="2" style="width: 12%; text-align: center; vertical-align: middle;">Tứ nón</td>
                            <td rowspan="2" style="width: 5%; text-align: center; vertical-align: middle;">#</td>
                        </tr>
                        <tr style="background: #e0fffe; height: 30px;">
                            <td style="width: 10%; text-align: center; vertical-align: middle;">Dạng</td>
                            <td style="width: 10%; text-align: center; vertical-align: middle;">Vật liệu</td>
                            <td style="width: 10%; text-align: center; vertical-align: middle;">Chiều cao (m)</td>
                            <td style="width: 11%; text-align: center; vertical-align: middle;">Vật liệu xà mũ</td>
                            <td style="width: 11%; text-align: center; vertical-align: middle;">Dạng</td>
                            <td style="width: 12%; text-align: center; vertical-align: middle;">Vật liệu</td>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($lists_ketcauduoi_mo as $list) {
                            if ($i % 2 == 0) {
                                $back = '#fff';
                            } else {
                                $back = '#f9f9f9';
                            }
                            $i++;
                            $thanmo_dang = @CauThongtinchung::findOne($list->thanmo_dang)->ten;
                            $thanmo_vatlieu = @CauThongtinchung::findOne($list->thanmo_vatlieu)->ten;
                            $thanmo_vatlieuxamu = @CauThongtinchung::findOne($list->thanmo_vatlieuxamu)->ten;
                            $mongmo_dang = @CauThongtinchung::findOne($list->mongmo_dang)->ten;
                            $mongmo_vatlieu = @CauThongtinchung::findOne($list->mongmo_vatlieu)->ten;
                            $tunon = @CauThongtinchung::findOne($list->tunon)->ten;
                            ?>
                            <tr style="background: #fff; height: 30px;">
                                <td style= "text-align:center;"><?= $list->kyhieu ?></td>
                                <td style= "text-align:center;"><?= $list->phia ?></td>
                                <td style= "text-align:center;"><?= $thanmo_dang ?></td>
                                <td style= "text-align:center;"><?= $thanmo_vatlieu ?></td>
                                <td style= "text-align:center;"><?= $list->thanmo_chieucao ?></td>
                                <td style= "text-align:center;"><?= $thanmo_vatlieuxamu ?></td>
                                <td style= "text-align:center;"><?= $mongmo_dang ?></td>
                                <td style= "text-align:center;"><?= $mongmo_vatlieu ?></td>
                                <td style= "text-align:center;"><?= $tunon ?></td>
                                <td style= "text-align:center;">
                                    <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['cau-ketcauduoi-mo/update', 'id' => $list->id_ketcauduoimo]) ?>
                                    <?=
                                    Html::a('<i class="glyphicon glyphicon-trash"></i>', ['cau-ketcauduoi-mo/delete', 'id' => $list->id_ketcauduoimo], [
                                        'data' => [
                                            'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                                            'method' => 'post',
                                        ],
                                    ])
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </td>
            </tr>
            <tr style="height:5px;">
                <td colspan="4" style="background-color:#fff"></td>
            </tr>
            <?php
        }
        ?>
        <tr style="height:30px;">
            <td style="height: 26px; background: #f9f9f9">
                2. Kết cấu trụ
                <span style="text-align: right; float: right; color: #009">
                    <?= Html::a('#Thêm mới', ['cau-ketcauduoi-tru/create', 'id_bridge' => $model->id_cau]) ?>
                </span>
            </td>
        </tr>
        <?php
        if (count($lists_ketcauduoi_tru) == 0) {
            echo '<tr style="height:30px;"><td style="background:#fff;">Không có thông tin</td></tr>';
        } else {
            ?>
            <tr>
                <td>
                    <table cellspacing="1" cellpadding="1" width="100%">
                        <tr style="background: #e0fffe; height: 30px;">
                            <td rowspan="2" style="width: 10%; text-align: center; vertical-align: middle;">Ký hiệu</td>
                            <td colspan="4" style="width: 40%; text-align: center; vertical-align: middle;">Thân trụ</td>
                            <td colspan="2" style="width: 22%; text-align: center; vertical-align: middle;">Móng trụ</td>
                            <td rowspan="2" style="width: 12%; text-align: center; vertical-align: middle;">Kết cấu phòng hộ</td>
                            <td rowspan="2" style="width: 5%; text-align: center; vertical-align: middle;">#</td>
                        </tr>
                        <tr style="background: #e0fffe; height: 30px;">
                            <td style="width: 10%; text-align: center; vertical-align: middle;">Dạng</td>
                            <td style="width: 10%; text-align: center; vertical-align: middle;">Vật liệu</td>
                            <td style="width: 10%; text-align: center; vertical-align: middle;">Chiều cao (m)</td>
                            <td style="width: 11%; text-align: center; vertical-align: middle;">V.liệu xà mũ</td>
                            <td style="width: 11%; text-align: center; vertical-align: middle;">Dạng</td>
                            <td style="width: 12%; text-align: center; vertical-align: middle;">Vật liệu</td>
                        </tr>
                        <?php
                        foreach ($lists_ketcauduoi_tru as $list) {
                            ?>
                            <tr style="background: #fff; height: 30px;">
                                <td style="text-align: center;"><?= $list->kyhieu ?></td>
                                <td style="text-align: center;">
                                    <?= ($list->thantru_dang != 0 ? CauThongtinchung::findOne($list->thantru_dang)->ten : '--') ?>
                                </td>
                                <td style="text-align: center;">
                                    <?= ($list->thantru_vatlieu != 0 ? CauThongtinchung::findOne($list->thantru_vatlieu)->ten : '--') ?>
                                </td>
                                <td style="text-align: center;"><?= $list->thantru_chieucao ?></td>
                                <td style="text-align: center;">
                                    <?= ($list->thantru_vatlieuxamu != 0 ? CauThongtinchung::findOne($list->thantru_vatlieuxamu)->ten : '--') ?>
                                </td>
                                <td style="text-align: center;">
                                    <?= ($list->mongtru_dang != 0 ? CauThongtinchung::findOne($list->mongtru_dang)->ten : '--') ?>
                                </td>
                                <td style="text-align: center;">
                                    <?= ($list->mongtru_vatlieu != 0 ? CauThongtinchung::findOne($list->mongtru_vatlieu)->ten : '--') ?>
                                </td>
                                <td style="text-align: center;">
                                    <?= ($list->ketcauphongho != 0 ? CauThongtinchung::findOne($list->ketcauphongho)->ten : '--') ?>
                                </td>
                                <td style= "text-align:center;">
                                    <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['cau-ketcauduoi-tru/update', 'id' => $list->id_ketcauduoitru]) ?>
                                    <?=
                                    Html::a('<i class="glyphicon glyphicon-trash"></i>', ['cau-ketcauduoi-tru/delete', 'id' => $list->id_ketcauduoitru], [
                                        'data' => [
                                            'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                                            'method' => 'post',
                                        ],
                                    ])
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<div class="row block_content" id="goicau">
    VII. GỐI CẦU
    <span style="text-align: right; float: right; color: #009">
        <?= Html::a('#Thêm mới', ['cau-goicau/create', 'id_bridge' => $model->id_cau]) ?>
    </span>
</div>
<div class="row">
    <?php
    if (count($lists_goicau) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 98%">
            <thead>
                <tr>
                    <td style="width: 10%; text-align: center; vertical-align: middle;">Thứ tự</td>
                    <td style="width: 17%; text-align: center; vertical-align: middle;">Trên nhịp</td>
                    <td style="width: 17%; text-align: center; vertical-align: middle;">Trên mố/trụ</td>
                    <td style="width: 17%; text-align: center; vertical-align: middle;">Dạng liên kết</td>
                    <td style="width: 17%; text-align: center; vertical-align: middle;">Vật liệu</td>
                    <td style="width: 17%; text-align: center; vertical-align: middle;">Ghi chú</td>
                    <td style="width: 5%; text-align: center; vertical-align: middle;">#</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lists_goicau as $list) {
                    ?>
                    <tr style="background: #fff;">
                        <td style="text-align: center;"><?= $list->thutu ?></td>
                        <td style="text-align: center;"><?= $list->trennhip ?></td>
                        <td style="text-align: center;"><?= $list->trenmotru ?></td>
                        <td>
                            <?= ($list->danglienket != 0 ? CauThongtinchung::findOne($list->danglienket)->ten : '--') ?>
                        </td>
                        <td>
                            <?= ($list->vatlieu != 0 ? CauThongtinchung::findOne($list->vatlieu)->ten : '--') ?>
                        </td>
                        <td><?= $list->ghichu ?></td>
                        <td style= "text-align:center;">
                            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['cau-goicau/update', 'id' => $list->id_goicau]) ?>
                            <?=
                            Html::a('<i class="glyphicon glyphicon-trash"></i>', ['cau-goicau/delete', 'id' => $list->id_goicau], [
                                'data' => [
                                    'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                                    'method' => 'post',
                                ],
                            ])
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

<div class="row block_content" id="khecogian">
    VIII. KHE CO GIÃN
    <span style="text-align: right; float: right; color: #009">
        <?= Html::a('#Thêm mới', ['cau-khecogian/create', 'id_bridge' => $model->id_cau]) ?>
    </span>
</div>
<div class="row">
    <?php
    if (count($lists_khecogian) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 98%">
            <thead>
                <tr>
                    <td style="width: 15%; text-align: center; vertical-align: middle;">Thứ tự</td>
                    <td style="width: 20%; text-align: center; vertical-align: middle;">Vị trí</td>
                    <td style="width: 20%; text-align: center; vertical-align: middle;">Loại khe</td>
                    <td style="width: 20%; text-align: center; vertical-align: middle;">Vật liệu chính</td>
                    <td style="width: 20%; text-align: center; vertical-align: middle;">Ghi chú</td>
                    <td style="width: 5%; text-align: center; vertical-align: middle;">#</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lists_khecogian as $list) {
                    ?>
                    <tr>
                        <td style="text-align:center"><?= $list->thutu ?></td>
                        <td style="text-align:center"><?= $list->vitri ?></td>
                        <td style="text-align:center">
                            <?= ($list->loaikhe != 0 ? CauThongtinchung::findOne($list->loaikhe)->ten : '--') ?>
                        </td>
                        <td style="text-align:center">
                            <?= ($list->vatlieuchinh != 0 ? CauThongtinchung::findOne($list->vatlieuchinh)->ten : '--') ?>
                        </td>
                        <td style="text-align:center"><?= $list->ghichu ?></td>
                        <td style="text-align:center">
                            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['cau-khecogian/update', 'id' => $list->id_khecogian]) ?>
                            <?=
                            Html::a('<i class="glyphicon glyphicon-trash"></i>', ['cau-khecogian/delete', 'id' => $list->id_khecogian], [
                                'data' => [
                                    'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                                    'method' => 'post',
                                ],
                            ])
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

<div class="row block_content" id="kebaove">
    IX. KÈ BẢO VỆ CẦU
    <span style="text-align: right; float: right; color: #009">
        <?= Html::a('#Thêm mới', ['cau-kebaove/create', 'id_bridge' => $model->id_cau]) ?>
    </span>
</div>
<div class="row">
    <?php
    if (count($lists_kebaove) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 98%">
            <thead>
                <tr>
                    <td style="width: 5%; text-align: center; vertical-align: middle;">Thứ tự</td>
                    <td style="width: 15%; text-align: center; vertical-align: middle;">Mô tả</td>
                    <td style="width: 15%; text-align: center; vertical-align: middle;">Chiều dài (m)</td>
                    <td style="width: 15%; text-align: center; vertical-align: middle;">Chiều cao max (m)</td>
                    <td style="width: 15%; text-align: center; vertical-align: middle;">Loại kè</td>
                    <td style="width: 15%; text-align: center; vertical-align: middle;">Vật liệu chính</td>
                    <td style="width: 15%; text-align: center; vertical-align: middle;">Loại móng kè</td>
                    <td style="width: 5%; text-align: center; vertical-align: middle;">#</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lists_kebaove as $list) {
                    ?>
                    <tr>
                        <td style="text-align: center;"><?= $list->thutu ?></td>
                        <td style="text-align: center;"><?= $list->mota ?></td>
                        <td style="text-align: center;"><?= $list->chieudai ?></td>
                        <td style="text-align: center;"><?= $list->chieucao ?></td>
                        <td style="text-align: center;">
                            <?= ($list->loaike != 0 ? CauThongtinchung::findOne($list->loaike)->ten : '--') ?>
                        </td>
                        <td style="text-align: center;">
                            <?= ($list->vatlieuchinh != 0 ? CauThongtinchung::findOne($list->vatlieuchinh)->ten : '--') ?>
                        </td>
                        <td style="text-align: center;">
                            <?= ($list->loaimongke != 0 ? CauThongtinchung::findOne($list->loaimongke)->ten : '--') ?>
                        </td>
                        <td style="text-align:center">
                            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['cau-kebaove/update', 'id' => $list->id_kebaove]) ?>
                            <?=
                            Html::a('<i class="glyphicon glyphicon-trash"></i>', ['cau-kebaove/delete', 'id' => $list->id_kebaove], [
                                'data' => [
                                    'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                                    'method' => 'post',
                                ],
                            ])
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

<div class="row block_content" id="thietbicongcong">
    X. THIẾT BỊ CÔNG CỘNG TRÊN CẦU
    <span style="text-align: right; float: right; color: #009">
        <?= Html::a('#Thêm mới', ['cau-thietbicongcongtrencau/create', 'id_bridge' => $model->id_cau]) ?>
    </span>
</div>
<div class="row">
    <?php
    if (count($lists_thietbicongcong) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 98%">
            <thead>
                <tr>
                    <td style="text-align:center; vertical-align: middle; width: 10%;">Thứ tự</td>
                    <td style="text-align:center; vertical-align: middle; width: 30%;">Tên - Loại - Quy cách thiết bị</td>
                    <td style="text-align:center; vertical-align: middle; width: 30%;">Cơ quan chủ quản</td>
                    <td style="text-align:center; vertical-align: middle; width: 25%;">Ghi chú</td>
                    <td style="text-align:center; vertical-align: middle; width: 5%;">#</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lists_thietbicongcong as $list) {
                    ?>
                    <tr>
                        <td style="text-align:center"><?= $list->thutu ?></td>
                        <td style="text-align:center"><?= $list->tenloai ?></td>
                        <td style="text-align:center"><?= $list->coquanchuquan ?></td>
                        <td style="text-align:center"><?= $list->ghichu ?></td>
                        <td style="text-align:center">
                            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['cau-thietbicongcongtrencau/update', 'id' => $list->id_thietbicongcong]) ?>
                            <?=
                            Html::a('<i class="glyphicon glyphicon-trash"></i>', ['cau-thietbicongcongtrencau/delete', 'id' => $list->id_thietbicongcong], [
                                'data' => [
                                    'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                                    'method' => 'post',
                                ],
                            ])
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


<div class="row block_content" id="thongtinduungluc">
    XI. THÔNG TIN DỰ ỨNG LỰC
    <span style="text-align: right; float: right; color: #009">
        <?= Html::a('#Thêm mới', ['cau-thongtinduungluc/create', 'id_bridge' => $model->id_cau]) ?>
    </span>
</div>
<div class="row">
    <?php
    if (count($lists_thongtinduungluc) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 98%">
            <thead>
                <tr>
                    <td style="text-align:center; vertical-align: middle; width: 10%;">Thứ tự</td>
                    <td style="text-align:center; vertical-align: middle; width: 30%;">Bộ phận kết cấu</td>
                    <td style="text-align:center; vertical-align: middle; width: 30%;">Loại dự ứng lực</td>
                    <td style="text-align:center; vertical-align: middle; width: 25%;">Ghi chú/Mô tả</td>
                    <td style="text-align:center; vertical-align: middle; width: 5%;">#</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lists_thongtinduungluc as $list) {
                    ?>
                    <tr>
                        <td style="text-align:center"><?= $list->thutu ?></td>
                        <td style="text-align:center"><?= $list->bophanketcau ?></td>
                        <td style="text-align:center">
                            <?= ($list->loaiduungluc != 0 ? CauThongtinchung::findOne($list->loaiduungluc)->ten : '--') ?>
                        </td>
                        <td style="text-align:center"><?= $list->ghichu ?></td>
                        <td style="text-align:center">
                            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['cau-thongtinduungluc/update', 'id' => $list->id_thongtinduungluc]) ?>
                            <?=
                            Html::a('<i class="glyphicon glyphicon-trash"></i>', ['cau-thongtinduungluc/delete', 'id' => $list->id_thongtinduungluc], [
                                'data' => [
                                    'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                                    'method' => 'post',
                                ],
                            ])
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

<div class="row block_content" id="chongthamvathoatnuoc">
    XII. CHỐNG THẤM VÀ THOÁT NƯỚC
    <span style="text-align: right; float: right; color: #009">
        <?= Html::a('#Thêm mới', ['cau-chongthamvathoatnuoc/create', 'id_bridge' => $model->id_cau]) ?>
    </span>
</div>
<div class="row">
    <?php
    if (count($lists_chongthamvathoatnuoc) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 98%">
            <thead>
                <tr>
                    <td style="text-align:center; vertical-align: middle; width: 10%;">Thứ tự</td>
                    <td style="text-align:center; vertical-align: middle; width: 40%;">Vị trí</td>
                    <td style="text-align:center; vertical-align: middle; width: 45%;">Mô tả</td>
                    <td style="text-align:center; vertical-align: middle; width: 5%;">#</td>
            </thead>
            <tbody>
                <?php
                foreach ($lists_chongthamvathoatnuoc as $list) {
                    ?>
                    <tr>
                        <td style="text-align:center"><?= $list->thutu ?></td>
                        <td style="text-align:center"><?= $list->vitri ?></td>
                        <td style="text-align:center"><?= $list->ghichu ?></td>
                        <td style="text-align:center">
                            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['cau-chongthamvathoatnuoc/update', 'id' => $list->id_chongtham]) ?>
                            <?=
                            Html::a('<i class="glyphicon glyphicon-trash"></i>', ['cau-chongthamvathoatnuoc/delete', 'id' => $list->id_chongtham], [
                                'data' => [
                                    'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                                    'method' => 'post',
                                ],
                            ])
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

<div class="row block_content" id="lichsusuachua">
    XIII. LỊCH SỬ DUY TU BẢO DƯỠNG VÀ SỬA CHỮA
    <span style="text-align: right; float: right; color: #009">
        <?= Html::a('#Thêm mới', ['cau-baotri/create', 'id_bridge' => $model->id_cau]) ?>
    </span>
</div>
<div class="row">
    <?php
    if (count($lists_lichsusuachua) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 98%">
            <thead>
                <tr>
                    <td style="text-align:center; vertical-align: middle; width: 20%;">Thời gian</td>
                    <td style="text-align:center; vertical-align: middle; width: 25%;">Nội dung công tác</td>
                    <td style="text-align:left; vertical-align: middle; width: 20%;">Đơn vị thực hiện</td>
                    <td style="text-align:right; vertical-align: middle; width: 10%;">Kinh phí</td>
                    <td style="text-align:center; vertical-align: middle; width: 20%;">Ghi chú</td>
                    <td style="text-align:center; vertical-align: middle; width: 5%;">#</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lists_lichsusuachua as $list) {
                    ?>
                    <tr>
                        <td style="text-align:center">
                            Từ <?= date_format(date_create($list->ngaybatdau), 'd/m/Y') . ' đến ' . date_format(date_create($list->ngayketthuc), 'd/m/Y') ?>
                        </td>
                        <td style="text-align:left"><?= $list->noidung ?></td>
                        <td style="text-align:left">
                            <?= ($list->id_donvithuchien != 0 ? Donvi::findOne($list->id_donvithuchien)->ten : '--') ?>
                        </td>
                        <td style="text-align:right"><?= number_format($list->giatri) ?></td>
                        <td style="text-align:left"><?= $list->ghichu ?></td>
                        <td style="text-align:center">
                            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['cau-baotri/update', 'id' => $list->id_baotri]) ?>
                            <?php /*
                              Html::a('<i class="glyphicon glyphicon-trash"></i>', ['cau-chongthamvathoatnuoc/delete', 'id' => $list->id_baotri], [
                              'data' => [
                              'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                              'method' => 'post',
                              ],
                              ]) */
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

<div class="row block_content" id="lichsukiemtra">
    XIV. LỊCH SỬ KIỂM TRA, KIỂM ĐỊNH
    <span style="text-align: right; float: right; color: #009">
        <?= Html::a('#Thêm mới', ['cau-kiemtra/create', 'id_bridge' => $model->id_cau]) ?>
    </span>
</div>
<div class="row">
    <?php
    if (count($lists_kiemtra) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 98%">
            <thead>
                <tr>
                    <td style="text-align:center; vertical-align: middle; width: 15%;">Tháng năm</td>
                    <td style="text-align:center; vertical-align: middle; width: 20%;">Công tác thực hiện</td>
                    <td style="text-align:center; vertical-align: middle; width: 10%;">Mức độ kiểm tra</td>
                    <td style="text-align:center; vertical-align: middle; width: 20%;">Đơn vị thực hiện</td>
                    <td style="text-align:center; vertical-align: middle; width: 10%;">Tình trạng hư hỏng</td>
                    <td style="text-align:center; vertical-align: middle; width: 20%;">Kết luận và Đánh giá</td>
                    <td style="text-align:center; vertical-align: middle; width: 5%;">#</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lists_kiemtra as $list) {
                    ?>
                    <tr>
                        <td style="text-align:center"><?= date_format(date_create($list->ngaykiemtra), 'd/m/Y') ?></td>
                        <td style="text-align:left"><?= $list->noidung ?></td>
                        <td style="text-align:center">
                            <?= ($list->id_mucdokiemtra != 0 ? MucDoKiemTra::findOne($list->id_mucdokiemtra)->ten : '--') ?>
                        </td>
                        <td style="text-align:left">
                            <?= ($list->id_donvikiemtra != 0 ? Donvi::findOne($list->id_donvikiemtra)->ten : '--') ?>
                        </td>
                        <td style="text-align:center">
                            <?php
                            if ($list->cansuachua == 0) {
                                echo Html::img('@web/toandq/images/icon-ok.png', ['alt'=>'Cầu tốt', 'title'=>'Cầu không cần bảo trì / sửa chữa', 'width'=>'20px']);
                            } else if ($list->cansuachua == 1) {
                                echo Html::img('@web/toandq/images/icon-danger.png', ['alt'=>'Cầu không đảm bảo', 'title'=>'Cầu cần bảo trì / sửa chữa', 'width'=>'20px']);
                            } else {
                                echo Html::img('@web/toandq/images/icon-danger-blue.png', ['alt'=>'Cầu đã được bảo trì / sửa chữa', 'title'=>'Cầu đã được bảo trì / sửa chữa', 'width'=>'20px']);
                            }
                            ?>
                        </td>
                        <td style="text-align:left"><?= $list->ketluan ?></td>
                        <td style="text-align:center">
                            <?php
                            if ($list->cansuachua != 2) {
                                echo Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['cau-kiemtra/update', 'id' => $list->id_kiemtra]);
                                echo Html::a(' <i class="glyphicon glyphicon-trash"></i>', ['cau-kiemtra/delete', 'id' => $list->id_kiemtra], [
                                    'data' => [
                                        'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                                        'method' => 'post',
                                    ],
                                ]);
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

<div class="row block_content" id="hosoanh">
    XV. HỒ SƠ ẢNH
    <span style="text-align: right; float: right; color: #009">
        <?= Html::a('#Thêm mới', ['cau-hinhanh/create', 'id_bridge' => $model->id_cau]) ?>
    </span>
</div>
<div class="row" style="text-align: center">
    <div class="w3-content w3-display-container">
        <?php
        if (count($lists_hinhanh) == 0) {
            echo 'Không có thông tin hình ảnh';
        } else {
            foreach ($lists_hinhanh as $list) {
                ?>
                <img class="mySlides" src="<?= Yii::$app->homeUrl . '/uploads/images/cau/' . $list->file ?>" style="width:96%">
                <?php
            }
            ?>
            <button class="w3-button w3-blue w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="w3-button w3-blue w3-display-right" onclick="plusDivs(1)">&#10095;</button>
            <script>
                var slideIndex = 1;
                showDivs(slideIndex);

                function plusDivs(n) {
                    showDivs(slideIndex += n);
                }

                function showDivs(n) {
                    var i;
                    var x = document.getElementsByClassName("mySlides");
                    if (n > x.length) {
                        slideIndex = 1
                    }
                    if (n < 1) {
                        slideIndex = x.length
                    }
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    x[slideIndex - 1].style.display = "block";
                }
            </script>
            <?php
        }
        ?>
    </div>
</div>
<div class="row block_content" id="bando">
    XVI. VỊ TRÍ TRÊN BẢN ĐỒ
    <span style="text-align: right; float: right; color: #009">
        #
    </span>
</div>
<div class="row">
    <?php
    if ($model->kinhdo == '' || $model->vido == '') {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 98%">
            <tr>
                <td>
                    <style type="text/css">
                        #map {
                            height: 400px;
                            width:100%;
                        }
                    </style>
                    <div id="map"></div>
                    <script>
                        function initMap() {
                            //var uluru = {lat: 20.680212, lng: 105.934212};
                            var uluru = {lat: <?= $model->vido ?>, lng: <?= $model->kinhdo ?>};
                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 15,
                                center: uluru
                            });
                            var marker = new google.maps.Marker({
                                position: uluru,
                                map: map
                            });
                        }
                    </script>
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_s_hwbsUFWpSF8sPyIIsoxL6NKq3LAlE&callback=initMap"></script>
                </td>
            </tr>
        </table>
        <?php
    }
    ?>
</div>

<div class="row block_content">
    THÔNG TIN KHÁC
</div>
<div class="row" style="margin-bottom: 30px">
    <div class="col-lg-3">Người tạo: <span class="chudam" style="color: #666"><?= $model->nguoitao ?></span></div>
    <div class="col-lg-3">Ngày tạo: <span class="chudam" style="color: #666"><?= $model->ngaytao ?></span></div>
    <div class="col-lg-3">Người cập nhật: <span class="chudam" style="color: #666"><?= $model->nguoisua ?></span></div>
    <div class="col-lg-3">Ngày cập nhật: <span class="chudam" style="color: #666"><?= $model->ngaysua ?></span></div>
</div>
<!--/div -->
