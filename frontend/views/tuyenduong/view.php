<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tuyenduong */

$this->title = $model->tenduong . ' (' . $model->mahieu . ')';
$this->params['breadcrumbs'][] = ['label' => 'Tuyến đường', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tuyenduong-view">
    <div class="row">
        <div class="col-lg-6">
            <h4>Tuyến đường: <?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['update', 'id' => $model->id_tuyenduong], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php
            if ($c_sum == 0) {     //nếu không có thông tin con thì cho phép xóa
                echo Html::a(' ', ['delete', 'id' => $model->id_tuyenduong], [
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
            //'id_tuyenduong',
            'mahieu',
            'tenduong',
            'capduong',
            [
                'attribute' => 'id_donviquanly',
                'value' => function ($model) {
                    return $model->donvi->ten;
                },
            ],
            [
                'attribute' => 'tukmchinh',
                'label' => 'Chiều dài cột km',
                'value' => function($model) {
                    return 'Km' . $model->tukmchinh . '+' . $model->tukmle . ' ÷ Km' . $model->denkmchinh . '+' . $model->denkmle;
                }
            ],
            [
                'attribute' => 'vidodau',
                'label' => 'Tọa độ (vĩ độ/kinh độ)',
                'value' => function($model) {
                    return 'N' . $model->vidodau . '/E' . $model->kinhdodau . ' ÷ N' . $model->vidocuoi . '/E' . $model->kinhdocuoi;
                }
            ],
            [
                'attribute' => 'chieudaithucte',
                'value' => function ($model) {
                    return $model->chieudaithucte . ' (km)';
                },
            ],
            'namhoanthanhxaydung',
            'solanxecogioi',
            [
                'attribute' => 'tocdothietke',
                'value' => function ($model) {
                    return $model->tocdothietke . ' (km/h)';
                },
            ],
            'nguoitao',
            'ngaytao:datetime',
            'nguoisua',
            'ngaysua:datetime',
        ],
    ])
    ?>
</div>
