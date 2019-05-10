<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKetcaunhip */

$this->title = 'Chi tiết Thông tin kết cấu nhịp ';//. $model->id_ketcaunhip;
$this->params['breadcrumbs'][] = ['label' => 'Kết cấu nhịp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cau-ketcaunhip-view">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['update', 'id' => $model->id_ketcaunhip], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php
            echo Html::a(' ', ['delete', 'id' => $model->id_ketcaunhip], [
                'class' => 'glyphicon glyphicon-trash btn btn-danger',
                'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                'method' => 'post',
                ],
                ]);
            ?>
        </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_ketcaunhip',
            [
                'label' => 'Cầu',
                'attribute' => 'id_cau',
                'value' => function ($model) {
                    return $model->cau->ten;
                },
            ],
            'kyhieunhip',
            [
                'label' => 'Sơ đồ kết cấu dọc cầu',
                'attribute' => 'doccau_sodoketcau',
                'value' => function ($model) {
                    return $model->loaisodoketcau->ten;
                },
            ],
            [
                'label' => 'Dạng kết cấu',
                'attribute' => 'doccau_dangketcau',
                'value' => function ($model) {
                    return $model->loaidangketcau->ten;
                },
            ],
            'doccau_chieudainhip',
            'doccau_culytimgoi',
            [
                'label' => 'Loại vượt',
                'attribute' => 'doccau_loaivuot',
                'value' => function ($model) {
                    return $model->loaivuot->ten;
                },
            ],  
            [
                'label' => 'Loại mặt đường trên cầu',
                'attribute' => 'doccau_loaimatduongtrencau',
                'value' => function ($model) {
                    return $model->loaimatduongtrencau->ten;
                },
            ],
            [
                'label' => 'Vật liệu đường bộ hành',
                'attribute' => 'doccau_vatlieuduongbohanh',
                'value' => function ($model) {
                    return $model->loaivatlieuduongbohanh->ten;
                },
            ], 
            [
                'label' => 'Vật liệu lan can tay vịn',
                'attribute' => 'doccau_vatlieulancantayvin',
                'value' => function ($model) {
                    return $model->loaivatlieulancantayvin->ten;
                },
            ],
            [
                'label' => 'Dạng dầm chủ',
                'attribute' => 'ngangcau_dangdamchu',
                'value' => function ($model) {
                    return $model->dangdamchu->ten;
                },
            ], 
            'ngangcau_sodamchu',
            'ngangcau_culydam',
            'ngangcau_chieucaodamchu',
            [
                'label' => 'Dạng dầm ngang',
                'attribute' => 'ngangcau_dangdamngang',
                'value' => function ($model) {
                    return $model->dangdamngang->ten;
                },
            ], 
            'ngangcau_dangdamdocphu',
            [
                'label' => 'Loại bản mặt cầu',
                'attribute' => 'ngangcau_loaibanmatcau',
                'value' => function ($model) {
                    return $model->loaibanmatcau->ten;
                },
            ],
            [
                'label' => 'Dạng kết cấu vòm',
                'attribute' => 'ngangcau_dangketcauvom',
                'value' => function ($model) {
                    return $model->dangketcauvom->ten;
                },
            ], 
        ],
    ]) ?>

</div>
