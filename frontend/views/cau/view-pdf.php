<?php

use yii\helpers\Html;
use frontend\models\CauThongtinchung;
use frontend\models\Donvi;
use frontend\models\MucDoKiemTra;

//use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cau */

\yii\web\YiiAsset::register($this);
?>
<div class="tieude" style="text-align: center">
    CỤC ĐƯỜNG BỘ VIỆT NAM
</div>
<div class="tieude" style="text-align: center; margin-top: 100px; font-size: 40px;">
    HỒ SƠ
</div>
<div class="tieude" style="text-align: center; font-size: 60px;">
    LÝ LỊCH CẦU
</div>
<div class="row" style="margin-top: 40px;">
    <div class="col-lg-1" style="text-align: center; font-size: 20px;"><span class="chunghieng">Số hiệu: </span> <?= ($model->sohieu) ? $model->sohieu : ' --- ' ?></div>
    <div class="col-lg-1" style="line-height: 200%; font-size: 18px;"><span class="chunghieng">Tên cầu: </span> <span class="chudam"><?= ($model->ten) ? $model->ten : ' --- ' ?></span></div>

    <div class="col-lg-3" style="line-height: 200%; font-size: 18px;"><span class="chunghieng">Lý trình: </span> <span class="chudam">Km<?= $model->kmchinh . ' + ' . $model->kmle ?></span></div>
    <div class="col-lg-3" style="line-height: 200%; font-size: 18px;"><span class="chunghieng">Đường: </span> <span class="chudam"><?= $model->tuyenduong->mahieu ?></span></div>
    <div class="col-lg-3" style="line-height: 200%; font-size: 18px;"><span class="chunghieng">Tỉnh, thành: </span> <span class="chudam"><?= @$model->vntinh->ten ?></span></div>

    <div class="col-lg-2" style="line-height: 200%; font-size: 18px;"><span class="chunghieng">Vượt qua: </span> <span class="chudam"><?= $model->loaidoituongvuot->ten ?></span></div>
    <div class="col-lg-2" style="line-height: 200%; font-size: 18px;"><span class="chunghieng">Tên sông, suối: </span> <span class="chudam"><?= ($model->tensongsuoi) ? $model->tensongsuoi : ' --- ' ?></span></div>

    <div class="col-lg-1" style="line-height: 200%; text-align: justify; font-size: 18px;">Khu QL&SCĐB, Sở GTVT (GTCC): <span class="chudam"><?= $model->tuyenduong->donvi->ten ?></span>.</div>
    <div class="col-lg-1" style="line-height: 200%; text-align: justify; font-size: 18px;">Đơn vị Quản lý / SC: <span class="chudam"><?= $model->tuyenduong->donvi->ten ?></span>.</div>

    <div class="col-lg-1" style="font-size: 18px; line-height: 200%;">Hồ sơ được lập ngày  
        <span class="gachduoi chudam"><?=date('d / m / Y', time())?></span> tại
        <span class="gachduoi"> 
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
        </span>
    </div>

    <div class="col-lg-2"></div>
    <div class="col-lg-2" style="text-align: center; float: right; margin-top: 40px;"><span class="chudam">THỦ TRƯỞNG ĐƠN VỊ </span><br/> <span class="chunghieng">(Ký tên đóng dấu)</span></div>
</div>
<pagebreak></pagebreak>

<div class="tieude">
    I. THÔNG TIN CHUNG
</div>
<p class="tieude2">Vị trí/ Chủ quản</p>

<div class="row">
    <div class="col-lg-3"><span class="chunghieng">Tên cầu: </span> <?= $model->ten ?></div>
    <div class="col-lg-3"><span class="chunghieng">Lý trình: </span>Km<?= $model->kmchinh . ' + ' . $model->kmle ?></div>
    <div class="col-lg-3"><span class="chunghieng">Đường: </span><?= $model->tuyenduong->mahieu ?></div>

    <div class="col-lg-1"><span class="chunghieng">Khu QL&SCĐB, Sở GTVT (GTCC): <?= $model->tuyenduong->donvi->ten ?></span></div>

    <div class="col-lg-1"><span class="chunghieng">Đơn vị Quản lý / SC: <?= $model->tuyenduong->donvi->ten ?></span></div>

    <div class="col-lg-2"><span class="chunghieng">Tỉnh, Thành phố: </span> <?= @$model->vntinh->ten ?></div>
    <div class="col-lg-2"><span class="chunghieng">Quận, Huyện: </span><?= @$model->vnhuyen->ten ?></div>
    <div class="col-lg-1"><span class="chunghieng">Xã, Phường: </span><?= @$model->vnxa->ten ?></div>

    <div class="col-lg-2"><span class="chunghieng">(*) Kinh độ: </span> <?= $model->kinhdo ?> Đông</div>
    <div class="col-lg-2"><span class="chunghieng">(*)Vĩ độ: </span> <?= $model->vido ?> Bắc</div>

    <p class="tieude2">Các số liệu chính về cầu</p>

    <div class="col-lg-2"><span class="chunghieng">Dạng cầu<sup>2</sup>: </span><?= ($model->loaidangcau ? $model->loaidangcau->ten : '--') ?></div>
    <div class="col-lg-2"><span class="chunghieng">Chiều dài<sup>3</sup> </span><?= $model->chieudai ?> (m)</div>

    <div class="col-lg-2"><span class="chunghieng">Số nhịp: </span><?= $model->sonhip ?></div>
    <div class="col-lg-2"><span class="chunghieng">Sơ đồ nhịp (Ln): </span><?= $model->sodonhip ?></div>

    <div class="col-lg-3"><span class="chunghieng">Bề rộng cầu: </span><?= $model->berongcau ?> (m)</div>
    <div class="col-lg-3"><span class="chunghieng">Phần xe chạy: </span><?= $model->berongphanxechay ?> (m)</div>
    <div class="col-lg-3"><span class="chunghieng">Phần bộ hành: </span><?= $model->berongphanbohanh ?> (m)</div>

    <div class="col-lg-3"><span class="chunghieng">Vượt qua: </span><?= $model->loaidoituongvuot->ten ?></div>
    <div class="col-lg-3"><span class="chunghieng">Tên sông suối: </span>
        <?php
        if ($model->tensongsuoi != '') {
            echo $model->tensongsuoi;
        } else {
            echo '---';
        }
        ?>
    </div>
    <div class="col-lg-3"><span class="chunghieng">Góc giao: 
            <?php
            if ($model->gocgiao != 0) {
                echo $model->gocgiao . '<sup>0</sup>';
            } else {
                echo '---';
            }
            ?>
    </div>

    <div class="col-lg-3"><span class="chunghieng">Tải trọng thiết kế: </span><?= ($model->loaitaitrongthietke ? $model->loaitaitrongthietke->ten : '--') ?></div>
    <div class="col-lg-3"><span class="chunghieng">Theo quy trình: </span><?= ($model->loaiquytrinhthietke ? $model->loaiquytrinhthietke->ten : '--') ?></div>
    <div class="col-lg-3"><span class="chunghieng">Năm XD: </span><?= $model->namxaydung ?></div>

    <div class="col-lg-2"><span class="chunghieng">Tải trọng khai thác: </span><?= $model->taitrongkhaithac ?> (tấn)</div>
    <div class="col-lg-2"><span class="chunghieng">Năm đưa vào khai thác: </span><?= $model->namduavaokhaithac ?></div>

    <div class="col-lg-3"><span class="chunghieng">Chạy chung với </span></div>
    <div class="col-lg-3"><span class="chunghieng">Đường sắt: </span>
        <?php
        if ($model->chaychungvoi_duongsat == 1) {
            echo 'Có';
        } else {
            echo 'Không';
        }
        ?>
    </div>
    <div class="col-lg-3"><span class="chunghieng">Công trình thủy lợi: </span>
        <?php
        if ($model->chaychungvoi_congtrinhthuyloi == 1) {
            echo 'Có';
        } else {
            echo 'Không';
        }
        ?>
    </div>

    <div class="col-lg-1">Đ.vị XD: <?= $model->donvixaydungcau ?></div>
</div>

<p class="tieude2">Ghi chú về lịch sử cầu: </p>
<div class="row">
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

<pagebreak></pagebreak>

<div class="row" style="text-align: center">
    <?php
    if ($lists_hinhanh_doc || $lists_hinhanh_ngang) {
        $i = 1;
        if ($lists_hinhanh_doc) {
            ?>
            <img src="<?= Yii::$app->homeUrl . '/uploads/images/cau/' . $lists_hinhanh_doc->file ?>" style="width:96%;"> 
            <p style="padding-bottom: 30px;">Hình <?= $i ?>: Sơ họa cắt dọc cầu</p>
            <?php
            $i += 1;
        }

        if ($lists_hinhanh_ngang) {
            ?>
            <img src="<?= Yii::$app->homeUrl . '/uploads/images/cau/' . $lists_hinhanh_ngang->file ?>" style="width:96%;"> 
            <p>Hình <?= $i ?>: Sơ họa cắt ngang cầu</p>
            <?php
        }
        echo '<pagebreak></pagebreak>';
    }
    ?>
</div>



<div class="tieude">
    II. CẮT NGANG MẶT CẦU
</div>
<div class="row">
    <?php
    if (count($lists_catngangmatcau) == 0) {
        echo 'Không có thông tin';
    } else {
        ?>
        <table class="table-bordered" style="width: 100%">
            <thead>
                <tr style="background: #e0fffe;">
                <td class="table_cont" style="width:13%" rowspan="2">Các nhịp cùng dạng</td>
                <td class="table_cont" style="width:12%" rowspan="2">Chiều rộng toàn cầu</td>
                <td class="table_cont" style="width:25%" colspan="2">Phần xe chạy</td>
                <td class="table_cont" style="width:25%" colspan="2">Phân cách</td>
                <td class="table_cont" style="width:25%" colspan="2">Đường bộ hành, lan can (1 bên)</td>
                </tr>
                <tr style="background: #e0fffe;">
                <td class="table_cont" style="width:13%;">Tổng chiều rộng</td>
                <td class="table_cont" style="width:12%;">Số làn xe</td>
                <td class="table_cont" style="width:13%;">Bề rộng phân cách giữa</td>
                <td class="table_cont" style="width:12%;">Bề rộng 1 bên phân cách biên</td>
                <td class="table_cont" style="width:13%;">Bề rộng đường bộ hành</td>
                <td class="table_cont" style="width:12%;">Bề rộng lan can</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lists_catngangmatcau as $list) {
                    ?>
                    <tr>
                    <td class="table_cont" ><?= $list['nhipcungdang'] ?> </td>
                    <td class="table_cont" ><?= $list['chieurongtoancau'] ?> (m) </td>
                    <td class="table_cont" ><?= $list['phanxechay_chieurong'] ?> (m) </td>
                    <td class="table_cont" ><?= $list['phanxechay_solanxe'] ?></td>
                    <td class="table_cont" ><?= $list['phancach_berongphancachgiua'] ?> (m) </td>
                    <td class="table_cont" ><?= $list['phancach_berongphancachbien'] ?> (m) </td>
                    <td class="table_cont" ><?= $list['duongbohanh_berong'] ?> (m) </td>
                    <td class="table_cont" ><?= $list['duongbohanh_beronglancan'] ?> (m)</td>
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

<div class="tieude">
    III. TĨNH KHÔNG VÀ BIỂN BÁO
</div>
<div class="row">
    <p class="tieude2">Tĩnh không dưới cầu:</p>
    <div class="col-lg-3">Về mùa khô (H<sub>max</sub>): <?= $model->tinhkhong_vemuakho ?> (m)</div>
    <div class="col-lg-3">Về mùa lũ (H<sub>min</sub>): <?= $model->tinhkhong_vemualu ?> (m)</div>
    <div class="col-lg-3">Cố định: <?= $model->tinhkhong_codinh ?> (m)</div>
    <div class="col-lg-3">Thông thuyền: <?= $model->tinhkhong_thongthuyen ?> (m)</div>
    <div class="col-lg-12" style="margin: 10px 0px 20px 0px;">Tĩnh không trên cầu: <?= $model->tinhkhong_trencau ?> (m)</div>
</div>
<div class="row">
    <p class="tieude2">Biển báo:</p>
    <div class="col-lg-3">Có biển tên cầu: <?= ($model->bienbao_tencau ? 'Có' : 'Không') ?></div>
    <div class="col-lg-3">Có biển tải trọng: <?= ($model->bienbao_taitrong != 0 ? $model->bienbao_taitrong . ' (T)' : 'Không') ?></div>
    <div class="col-lg-3">Có biển hạn chế tốc độ: <?= ($model->bienbao_tocdo != 0 ? $model->bienbao_tocdo . ' (km/h)' : 'Không') ?></div>
    <div class="col-lg-3">Có biển khống chế cự ly xe: <?= ($model->bienbao_culyxe != 0 ? $model->bienbao_culyxe . ' (m)' : 'Không') ?></div>
</div>
<div class="row" style="padding-top: 20px;">
    <div class="col-lg-3">Có biển hạn chế chiều cao: <?= ($model->bienbao_chieucao != 0 ? $model->bienbao_chieucao . ' (m)' : 'Không') ?></div>
    <div class="col-lg-3">Có biển hạn chế chiều rộng: <?= ($model->bienbao_chieurong != 0 ? $model->bienbao_chieurong . ' (T)' : 'Không') ?></div>
    <div class="col-lg-6">Các biển báo khác: <?= ($model->bienbao_khac != '' ? $model->bienbao_khac : '--') ?></div>
</div>

<div class="tieude">
    IV. MỘT SỐ ĐẶC ĐIỂM DÒNG CHẢY
</div>
<div class="row">    
    <div class="col-lg-3">Bị ảnh hưởng của thủy triều: <?= ($model->dongchay_thuytrieu != 0 ? 'Có' : 'Không') ?></div>
    <div class="col-lg-3">Biên độ thủy triều: <?= ($model->dongchay_thuytrieu != 0 ? $model->dongchay_thuytrieu . ' (m)' : 'Không') ?></div>
    <div class="col-lg-3">Sông bị nhiễm mặn: <?= ($model->dongchay_nhiemman ? 'Có' : 'Không') ?></div>
</div>
<div class="row" style="padding-top: 10px">    
    <div class="col-lg-3">Bị ảnh hưởng của lũ lụt: <?= ($model->dongchay_lulut ? 'Có' : 'Không') ?></div>
    <div class="col-lg-3">Sông có thông thuyền: <?= ($model->dongchay_thongthuyen ? 'Có' : 'Không') ?></div>
    <div class="col-lg-3">Cấp sông: <?= ($model->dongchay_capsong ? $model->dongchay_capsong : '--') ?></div>
</div>
<div class="row" style="padding-top: 10px">    
    <div class="col-lg-12">Thời kỳ lũ: <?= ($model->dongchay_thoikylu ? $model->dongchay_thoikylu : '--') ?></div>
</div>

<pagebreak></pagebreak>

<div class="tieude">
    V. KẾT CẤU NHỊP
</div>
<div class="row">
    <?php
    if (count($lists_ketcaunhip) == 0) {
        echo 'Không có thông tin';
    } else {
        ?>
        <table style="border: none; width: 100%">
            <tr>
            <td style="border: none;">
                <table style="width: 100%">
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
                        <tr style="height: 26px; ">
                        <td colspan="4" style="font-weight: bold; text-align: left">Ký hiệu nhịp: <?= $list->kyhieunhip ?></td>
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
                                <img style="width: 1000px;" src="<?= Yii::$app->homeUrl . 'uploads/images/cau-ketcaunhip/' . $list->file ?>" style="width:96%;"/>
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

<pagebreak></pagebreak>

<div class="tieude">
    VI. KẾT CẤU DƯỚI
</div>
<div class="row">
    <table style="border: none; width: 100%">
        <tr style="height:30px;">
        <td style="height: 26px; background: #f9f9f9; font-weight: bold; text-align: left; border: none">
            Kết cấu mố
        </td>
        </tr>
        <?php
        if (count($lists_ketcauduoi_mo) == 0) {
            echo '<tr style="height:30px; border: none"><td style="background:#fff; border: none">Không có thông tin</td></tr>';
        } else {
            ?>
            <tr style="height:30px;">
            <td style="border: none">
                <table cellspacing="1" cellpadding="1" width="100%">
                    <tr style="background: #e0fffe; height: 30px;">
                    <td rowspan="2" style="width: 10%; text-align: center; vertical-align: middle;">Ký hiệu</td>
                    <td rowspan="2" style="width: 10%; text-align: center; vertical-align: middle;">Phía</td>
                    <td colspan="4" style="width: 41%; text-align: center; vertical-align: middle;">Thân mố</td>
                    <td colspan="2" style="width: 22%; text-align: center; vertical-align: middle;">Móng mố</td>
                    <td rowspan="2" style="width: 12%; text-align: center; vertical-align: middle;">Tứ nón</td>
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
                        <?php
                    }
                    ?>
                </table>
            </td>
            </tr>
            <tr style="height:5px; border: none;">
            <td colspan="4" style="background-color:#fff; border: none;"></td>
            </tr>
            <?php
        }
        ?>
        <tr style="height:30px; border: none">
        <td style="height: 26px; background: #f9f9f9; font-weight: bold; text-align: left; border: none">
            Kết cấu trụ
        </td>
        </tr>
        <?php
        if (count($lists_ketcauduoi_tru) == 0) {
            echo '<tr style="height:30px; border: none"><td style="background:#fff; border: none">Không có thông tin</td></tr>';
        } else {
            ?>
            <tr>
            <td style="border: none;">
                <table style="width: 100%;">
                    <tr style="background: #e0fffe; height: 30px;">
                    <td rowspan="2" style="width: 10%; text-align: center; vertical-align: middle;">Ký hiệu</td>
                    <td colspan="4" style="width: 40%; text-align: center; vertical-align: middle;">Thân trụ</td>
                    <td colspan="2" style="width: 22%; text-align: center; vertical-align: middle;">Móng trụ</td>
                    <td rowspan="2" style="width: 17%; text-align: center; vertical-align: middle;">Kết cấu phòng hộ</td>
                    </tr>
                    <tr style="background: #e0fffe; height: 30px;">
                    <td style="width: 10%; text-align: center; vertical-align: middle;">Dạng</td>
                    <td style="width: 10%; text-align: center; vertical-align: middle;">Vật liệu</td>
                    <td style="width: 10%; text-align: center; vertical-align: middle;">Chiều cao (m)</td>
                    <td style="width: 11%; text-align: center; vertical-align: middle;">V.liệu xà mũ</td>
                    <td style="width: 11%; text-align: center; vertical-align: middle;">Dạng</td>
                    <td style="width: 17%; text-align: center; vertical-align: middle;">Vật liệu</td>
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

<pagebreak></pagebreak>

<div class="tieude">
    VII. GỐI CẦU
</div>
<div class="row">
    <?php
    if (count($lists_goicau) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr style="background: #e0fffe">
                <td style="width: 10%; text-align: center; vertical-align: middle;">Thứ tự</td>
                <td style="width: 17%; text-align: center; vertical-align: middle;">Trên nhịp</td>
                <td style="width: 17%; text-align: center; vertical-align: middle;">Trên mố/trụ</td>
                <td style="width: 17%; text-align: center; vertical-align: middle;">Dạng liên kết</td>
                <td style="width: 17%; text-align: center; vertical-align: middle;">Vật liệu</td>
                <td style="width: 22%; text-align: center; vertical-align: middle;">Ghi chú</td>
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

<pagebreak></pagebreak>

<div class="tieude">
    VIII. KHE CO GIÃN
</div>
<div class="row">
    <?php
    if (count($lists_khecogian) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr style="background: #e0fffe">
                <td style="width: 15%; text-align: center; vertical-align: middle;">Thứ tự</td>
                <td style="width: 20%; text-align: center; vertical-align: middle;">Vị trí</td>
                <td style="width: 20%; text-align: center; vertical-align: middle;">Loại khe</td>
                <td style="width: 20%; text-align: center; vertical-align: middle;">Vật liệu chính</td>
                <td style="width: 25%; text-align: center; vertical-align: middle;">Ghi chú</td>
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

<div class="tieude">
    IX. KÈ BẢO VỆ CẦU
</div>
<div class="row">
    <?php
    if (count($lists_kebaove) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr style="background: #e0fffe">
                <td style="width: 5%; text-align: center; vertical-align: middle;">Thứ tự</td>
                <td style="width: 15%; text-align: center; vertical-align: middle;">Mô tả</td>
                <td style="width: 15%; text-align: center; vertical-align: middle;">Chiều dài (m)</td>
                <td style="width: 15%; text-align: center; vertical-align: middle;">Chiều cao max (m)</td>
                <td style="width: 15%; text-align: center; vertical-align: middle;">Loại kè</td>
                <td style="width: 15%; text-align: center; vertical-align: middle;">Vật liệu chính</td>
                <td style="width: 20%; text-align: center; vertical-align: middle;">Loại móng kè</td>
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

<pagebreak></pagebreak>

<div class="tieude">
    X. THIẾT BỊ CÔNG CỘNG TRÊN CẦU
</div>
<div class="row">
    <?php
    if (count($lists_thietbicongcong) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr style="background: #e0fffe">
                <td style="text-align:center; vertical-align: middle; width: 10%;">Thứ tự</td>
                <td style="text-align:center; vertical-align: middle; width: 30%;">Tên - Loại - Quy cách thiết bị</td>
                <td style="text-align:center; vertical-align: middle; width: 30%;">Cơ quan chủ quản</td>
                <td style="text-align:center; vertical-align: middle; width: 30%;">Ghi chú</td>
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


<div class="tieude">
    XI. THÔNG TIN DỰ ỨNG LỰC
</div>
<div class="row">
    <?php
    if (count($lists_thongtinduungluc) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr style="background: #e0fffe">
                <td style="text-align:center; vertical-align: middle; width: 10%;">Thứ tự</td>
                <td style="text-align:center; vertical-align: middle; width: 30%;">Bộ phận kết cấu</td>
                <td style="text-align:center; vertical-align: middle; width: 30%;">Loại dự ứng lực</td>
                <td style="text-align:center; vertical-align: middle; width: 30%;">Ghi chú/Mô tả</td>
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

<div class="tieude">
    XII. CHỐNG THẤM VÀ THOÁT NƯỚC
</div>
<div class="row">
    <?php
    if (count($lists_chongthamvathoatnuoc) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr style="background: #e0fffe">
                <td style="text-align:center; vertical-align: middle; width: 15%;">Thứ tự</td>
                <td style="text-align:center; vertical-align: middle; width: 40%;">Vị trí</td>
                <td style="text-align:center; vertical-align: middle; width: 45%;">Mô tả</td>
            </thead>
            <tbody>
                <?php
                foreach ($lists_chongthamvathoatnuoc as $list) {
                    ?>
                    <tr>
                    <td style="text-align:center"><?= $list->thutu ?></td>
                    <td style="text-align:center"><?= $list->vitri ?></td>
                    <td style="text-align:center"><?= $list->ghichu ?></td>
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

<pagebreak></pagebreak>

<div class="tieude">
    XIII. LỊCH SỬ DUY TU BẢO DƯỠNG VÀ SỬA CHỮA
</div>
<div class="row">
    <?php
    if (count($lists_lichsusuachua) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr style="background: #e0fffe">
                <td style="text-align:center; vertical-align: middle; width: 20%;">Thời gian</td>
                <td style="text-align:center; vertical-align: middle; width: 25%;">Nội dung công tác</td>
                <td style="text-align:left; vertical-align: middle; width: 20%;">Đơn vị thực hiện</td>
                <td style="text-align:right; vertical-align: middle; width: 20%;">Kinh phí</td>
                <td style="text-align:center; vertical-align: middle; width: 15%;">Ghi chú</td>
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
                    <td style="text-align:center"><?= $list->noidung ?></td>
                    <td style="text-align:left">
                        <?= ($list->id_donvithuchien != 0 ? Donvi::findOne($list->id_donvithuchien)->ten : '--') ?>
                    </td>
                    <td style="text-align:right"><?= number_format($list->giatri) ?></td>
                    <td style="text-align:center"><?= $list->ghichu ?></td>
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

<div class="tieude">
    XIV. LỊCH SỬ KIỂM TRA, KIỂM ĐỊNH
</div>
<div class="row">
    <?php
    if (count($lists_kiemtra) == 0) {
        echo 'Không có thông tin.';
    } else {
        ?>
        <table class="table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr style="background: #e0fffe">
                <td style="text-align:center; vertical-align: middle; width: 15%;">Tháng năm</td>
                <td style="text-align:center; vertical-align: middle; width: 20%;">Công tác thực hiện</td>
                <td style="text-align:left; vertical-align: middle; width: 10%;">Mức độ kiểm tra</td>
                <td style="text-align:center; vertical-align: middle; width: 20%;">Đơn vị thực hiện</td>
                <td style="text-align:center; vertical-align: middle; width: 10%;">Tình trạng hư hỏng</td>
                <td style="text-align:center; vertical-align: middle; width: 25%;">Kết luận và Đánh giá</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lists_kiemtra as $list) {
                    ?>
                    <tr>
                    <td style="text-align:center"><?= date_format(date_create($list->ngaykiemtra), 'd/m/Y') ?></td>
                    <td style="text-align:center"><?= $list->noidung ?></td>
                    <td style="text-align:left">
                        <?= ($list->id_mucdokiemtra != 0 ? MucDoKiemTra::findOne($list->id_mucdokiemtra)->ten : '--') ?>
                    </td>
                    <td style="text-align:center">
                        <?= ($list->id_donvikiemtra != 0 ? Donvi::findOne($list->id_donvikiemtra)->ten : '--') ?>
                    </td>
                    <td style="text-align:center">
                        <?php
                        if ($list->cansuachua == 0) {
                            echo 'Không';
                        } else if ($list->cansuachua == 1) {
                            echo 'Cần phải sửa chữa';
                        } else {
                            echo 'Đã được sửa chữa';
                        }
                        ?>
                    </td>
                    <td style="text-align:center"><?= $list->ketluan ?></td>
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

<pagebreak></pagebreak>

<div class="tieude">
    XV. HỒ SƠ ẢNH
</div>
<div class="row" style="text-align: center">
    <div class="w3-content w3-display-container">
        <?php
        if (count($lists_hinhanh) == 0) {
            echo 'Không có thông tin hình ảnh';
        } else {
            ?>
            <table class="table table-striped table-bordered" style="width: 100%">
                <thead>
                    <tr style="background: #e0fffe">
                    <td style="text-align:center; vertical-align: middle; width: 10%;">TT</td>
                    <td style="text-align:center; vertical-align: middle; width: 60%;">Ảnh</td>
                    <td style="text-align:center; vertical-align: middle; width: 30%;">Nội dung</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($lists_hinhanh as $list) {
                    ?>
                    <tr>
                        <td style="text-align:center"><?=$i?></td>
                        <td style="text-align:center; padding: 10px;">
                            <img src="<?= Yii::$app->homeUrl . '/uploads/images/cau/' . $list->file ?>" style="width:96%; height: 440px;">
                        </td>
                        <td style="text-align:left; padding: 10px;"><?= $list->noidung ?></td>
                    </tr>
                    <?php
                    $i += 1;
                    }
                    ?>
                </tbody>
            </table>
            <?php
        }
        ?>
    </div>
</div>
