<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKetcauduoiMo */

$this->title = 'Chi tiết thông tin kết cấu dưới - mố'; //$model->id_ketcauduoimo;
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Kết cấu dưới - Mố', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cau-ketcauduoi-mo-view">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['update', 'id' => $model->id_ketcauduoimo], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php
            echo Html::a(' ', ['delete', 'id' => $model->id_ketcauduoimo], [
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
            //'id_ketcauduoimo',
            [
                'label' => 'Cầu',
                'attribute' => 'id_cau',
                'value' => function ($model) {
                    return $model->cau->ten;
                },
            ],
            'kyhieu',
            'phia',
            [
                'label' => 'Dạng thân mố',
                'attribute' => 'thanmo_dang',
                'value' => function ($model) {
                    return $model->dangthanmo->ten;
                },
            ],
            [
                'label' => 'Vật liệu thân mố',
                'attribute' => 'thanmo_vatlieu',
                'value' => function ($model) {
                    return $model->vatlieuthanmo->ten;
                },
            ],
            'thanmo_chieucao',
            [
                'label' => 'Vật liệu xà mũ',
                'attribute' => 'thanmo_vatlieuxamu',
                'value' => function ($model) {
                    return $model->vatlieuxamu->ten;
                },
            ],
            [
                'label' => 'Dạng móng mố',
                'attribute' => 'mongmo_dang',
                'value' => function ($model) {
                    return $model->dangmongmo->ten;
                },
            ],
            [
                'label' => 'Vật liệu móng mố',
                'attribute' => 'mongmo_vatlieu',
                'value' => function ($model) {
                    return $model->dangmongmo->ten;
                },
            ],
            [
                'label' => 'Tứ nón',
                'attribute' => 'tunon',
                'value' => function ($model) {
                    return $model->loaitunon->ten;
                },
            ],
        ],
    ])
    ?>

</div>
