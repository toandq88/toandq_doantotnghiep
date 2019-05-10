<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauHinhanh */

$this->title = 'Chi tiết hình ảnh'; //$model->id_hinhanh;
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Hình ảnh', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cau-hinhanh-view">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['update', 'id' => $model->id_hinhanh], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php
            echo Html::a(' ', ['delete', 'id' => $model->id_hinhanh], [
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
            //'id_hinhanh',
            [
                'label' => 'Cầu',
                'attribute' => 'id_cau',
                'value' => function ($model) {
                    return $model->cau->ten;
                },
            ],
            'loai',
            'file',
            'noidung',
            [
                'attribute' => 'file',
                'label' => 'Xem ảnh',
                'value' => function($model) {
                    if ($model->file != "") {
                        return Yii::$app->homeUrl . '/uploads/images/cau/' . $model->file;
                    } else {
                        return Yii::$app->homeUrl . '/uploads/images/cau/no-logo.png';
                    }
                },
                'format' => ['image', ['width' => '40%']],
            ],
        ],
    ])
    ?>

</div>
