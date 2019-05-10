<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauBaotri */

$this->title = 'Chi tiết thông tin';// . $model->id_baotri;
$this->params['breadcrumbs'][] = ['label' => 'Thông tin bảo trì cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-baotri-view">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['update', 'id' => $model->id_baotri], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?=
        Html::a(' ', ['delete', 'id' => $model->id_baotri], [
            'class' => 'glyphicon glyphicon-trash btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này không?',
                'method' => 'post',
            ],
        ])
        ?>
        </div>
    </div>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_baotri',
            [
                'label' => 'Cầu',
                'attribute' => 'id_cau',
                'value' => function ($model) {
                    return $model->cau->ten;
                },
            ],
            [
                'label' => 'Cho đợt kiểm tra',
                'attribute' => 'id_kiemtra',
                'value' => function ($model) {
                    if ($model->id_kiemtra != "") {
                        return 'Đợt kiểm tra ngày ' . date_format(date_create($model->dotkiemtra->ngaykiemtra), 'd/m/Y');
                    }
                },
            ],
            [
                'attribute' => 'ngaybatdau',
                'value' => function ($model) {
                    if ($model->ngaybatdau != "") {
                        return date_format(date_create($model->ngaybatdau), 'd/m/Y');
                    }
                },
            ],
            [
                'attribute' => 'ngayketthuc',
                'value' => function ($model) {
                    if ($model->ngayketthuc != "") {
                        return date_format(date_create($model->ngayketthuc), 'd/m/Y');
                    }
                },
            ],
            [
                'label' => 'Mức độ bảo trì',
                'attribute' => 'id_mucdobaotri',
                'value' => function ($model) {
                    return $model->mucdo->ten_mucdo;
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
                'label' => 'Giá trị thực hiện',
                'attribute' => 'giatri',
                'value' => function ($model) {
                    return number_format($model->giatri) . ' (VNĐ)';
                },
            ],
            [
                'label' => 'Đơn vị thực hiện',
                'attribute' => 'id_donvithuchien',
                'value' => function ($model) {
                    return $model->donvi->ten;
                },
            ],
            [
                'attribute' => 'file',
                'label' => 'File hồ sơ',
                'value' => function($model) {
                    if ($model->file != "") {
                        return Html::a('Xem', Yii::$app->homeUrl . 'uploads/baotri-hoso/' . $model->file);
                    }
                },
                'format' => ['raw'],
            ],
            [
                'attribute' => 'ghichu',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->ghichu;
                },
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
                        return Yii::$app->homeUrl . '/uploads/images/cau-baotri/'.$model->hinhanh;
                    } else {
                        return Yii::$app->homeUrl . '/uploads/images/cau-baotri/no-image.jpg';
                    }
                },
                'format' => ['image', ['width' => '666px', 'max-height' => '100%']],
            ],
        ],
    ])
    ?>

</div>
