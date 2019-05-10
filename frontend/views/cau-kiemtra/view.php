<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKiemtra */

$this->title = $model->cau->ten.' ngày '. date_format(date_create($model->ngaykiemtra), 'd/m/Y');
$this->params['breadcrumbs'][] = ['label' => 'Thông tin kiểm tra cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-kiemtra-view">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['cau-baotri/create', 'id_check' => $model->id_kiemtra, 'id_bridge' => $model->id_cau],['title' => 'Cập nhật thông tin bảo trì / sửa chữa', 'class' => 'glyphicon glyphicon-cog btn btn-success']) ?>
            <?= Html::a(' ', ['update', 'id' => $model->id_kiemtra], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php
            echo Html::a(' ', ['delete', 'id' => $model->id_kiemtra], [
                'class' => 'glyphicon glyphicon-trash btn btn-danger',
                'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                'method' => 'post',
                ],
                ]);
            ?>
        </div>
    </div>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_kiemtra',
            [
                'label' => 'Cầu',
                'attribute' => 'id_cau',
                'value' => function ($model) {
                    return $model->cau->ten;
                },
            ],
            [
                'label' => 'Đơn vị kiểm tra',
                'attribute' => 'id_donvikiemtra',
                'value' => function ($model) {
                    return $model->donvi->ten;
                },
            ],
            [
                'attribute' => 'ngaykiemtra',
                'value' => function ($model) {
                    if ($model->ngaykiemtra != "") {
                        return date_format(date_create($model->ngaykiemtra), 'd/m/Y');
                    }
                },
            ],
            [
                'label' => 'Mức độ kiểm tra',
                'attribute' => 'id_mucdokiemtra',
                'value' => function ($model) {
                    return $model->mucdo->ten;
                },
            ],
            [
                'attribute' => 'noidung',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->noidung;
                },
            ],
            [
                'attribute' => 'ketluan',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->ketluan;
                },
            ],
            [
                'attribute' => 'cansuachua',
                'label' => 'Cần sửa chữa',
                'value' => function($model) {
                    if ($model->cansuachua == 0) {
                        return 'Không';
                    } else if ($model->cansuachua == 1) {
                        return 'Cần phải sửa chữa';
                    } else {
                        return 'Đã được sửa chữa';
                    }
                }
            ],
            [
                'attribute' => 'file',
                'label' => 'File hồ sơ',
                'value' => function($model) {
                    if ($model->file != "") {
                        return Html::a('Xem', Yii::$app->homeUrl . 'uploads/kiemtra-hoso/' . $model->file);
                    }
                },
                'format' => ['raw'],
            ],
            'nguoitao',
            'ngaytao',
            'nguoisua',
            'ngaysua',
            [
                'attribute' => 'hinhanh',
                'label' => 'Hình ảnh',
                'value' => function($model) {
                    if ($model->hinhanh != "") {
                        return Yii::$app->homeUrl . '/uploads/images/cau-kiemtra/'.$model->hinhanh;
                    } else {
                        return Yii::$app->homeUrl . '/uploads/images/cau-kiemtra/no-image.jpg';
                    }
                },
                'format' => ['image', ['width' => '666px', 'max-height' => '100%']],
            ],
        ],
    ])
    ?>

</div>
