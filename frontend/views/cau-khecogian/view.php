<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKhecogian */

$this->title = 'Chi tiết thông tin khe co giãn ';//$model->id_khecogian;
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Khe co giãn', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cau-khecogian-view">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['update', 'id' => $model->id_khecogian], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php
            echo Html::a(' ', ['delete', 'id' => $model->id_khecogian], [
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
            //'id_khecogian',
            [
                'label' => 'Cầu',
                'attribute' => 'id_cau',
                'value' => function ($model) {
                    return $model->cau->ten;
                },
            ],
            'thutu',
            'vitri',
            [
                'label' => 'Loại khe',
                'attribute' => 'loaikhe',
                'value' => function ($model) {
                    return $model->loaikhecogian->ten;
                },
            ],
            [
                'label' => 'Vật liệu chính',
                'attribute' => 'vatlieuchinh',
                'value' => function ($model) {
                    return $model->loaivatlieu->ten;
                },
            ],
            'ghichu',
        ],
    ]) ?>

</div>
