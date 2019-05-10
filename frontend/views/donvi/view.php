<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Donvi */

$this->title = $model->ten;
$this->params['breadcrumbs'][] = ['label' => 'Đơn vị', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donvi-view">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['update', 'id' => $model->id_donvi], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php
            if ($d_sum == 0) {
                echo Html::a(' ', ['delete', 'id' => $model->id_donvi], [
                    'class' => 'glyphicon glyphicon-trash btn btn-danger',
                    'data' => [
                        'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                        'method' => 'post',
                    ],
                ]);
            }
            ?>
        </div>
    </div>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_donvi',
            'ten',
            'tenviettat',
            'diachi',
            'email:email',
            'dienthoai',
            'website',
            [
                'attribute' => 'mota',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->mota;
                },
            ],
            'ngaytao:datetime',
            [
                'attribute' => 'loaidonvi',
                'label' => 'Loại đơn vị',
                'value' => function($model) {
                    if ($model->loaidonvi == 1) {
                        return 'Đơn vị chủ quản';
                    } else if ($model->loaidonvi == 2) {
                        return 'Đơn vị quản lý, vận hành';
                    } else {
                        return 'Đơn vị xây dựng, bảo trì';
                    }
                }
            ],
            [
                'attribute' => 'hinhanh',
                'label' => 'Logo',
                'value' => function($model) {
                    if ($model->hinhanh != "") {
                        return Yii::$app->homeUrl . '/uploads/images/donvi/' . $model->hinhanh;
                    } else {
                        return Yii::$app->homeUrl . '/uploads/images/donvi/no-logo.png';
                    }
                },
                'format' => ['image', ['width' => '120', 'height' => '120']],
            ],
        ],
    ])
    ?>

</div>
