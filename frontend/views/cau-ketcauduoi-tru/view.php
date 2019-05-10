<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKetcauduoiTru */

$this->title = 'Chi tiết thông tin';// $model->id_ketcauduoitru;
$this->params['breadcrumbs'][] = ['label' => ' Kết cấu dưới - Trụ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cau-ketcauduoi-tru-view">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['update', 'id' => $model->id_ketcauduoitru], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php
            echo Html::a(' ', ['delete', 'id' => $model->id_ketcauduoitru], [
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
            //'id_ketcauduoitru',
            [
                'label' => 'Cầu',
                'attribute' => 'id_cau',
                'value' => function ($model) {
                    return $model->cau->ten;
                },
            ],
            'kyhieu',
            [
                'label' => 'Dạng thân trụ',
                'attribute' => 'thantru_dang',
                'value' => function ($model) {
                    return $model->dangthantru->ten;
                },
            ],
            [
                'label' => 'Vật liệu thân trụ',
                'attribute' => 'thantru_vatlieu',
                'value' => function ($model) {
                    return $model->vatlieuthantru->ten;
                },
            ],
            'thantru_chieucao',
            [
                'label' => 'Vật liệu xà mũ',
                'attribute' => 'thantru_vatlieuxamu',
                'value' => function ($model) {
                    return $model->vatlieuxamu->ten;
                },
            ],
            [
                'label' => 'Dạng móng trụ',
                'attribute' => 'mongtru_dang',
                'value' => function ($model) {
                    return $model->dangmongtru->ten;
                },
            ],
            [
                'label' => 'Vật liệu móng trụ',
                'attribute' => 'mongtru_vatlieu',
                'value' => function ($model) {
                    return $model->vatlieumongtru->ten;
                },
            ],
            [
                'label' => 'Kết cấu phòng hộ',
                'attribute' => 'ketcauphongho',
                'value' => function ($model) {
                    return $model->loaiketcauphongho->ten;
                },
            ],
        ],
    ]) ?>

</div>
