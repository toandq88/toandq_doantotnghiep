<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKebaove */

$this->title = 'Chi tiết thông tin kè bảo vệ';// $model->id_kebaove;
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Kè bảo vệ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cau-kebaove-view">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['update', 'id' => $model->id_kebaove], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php
            echo Html::a(' ', ['delete', 'id' => $model->id_kebaove], [
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
            //'id_kebaove',
            [
                'label' => 'Cầu',
                'attribute' => 'id_cau',
                'value' => function ($model) {
                    return $model->cau->ten;
                },
            ],
            'thutu',
            'mota',
            'chieudai',
            'chieucao',
            [
                'label' => 'Loại kè',
                'attribute' => 'loaike',
                'value' => function ($model) {
                    return $model->loaikebaove->ten;
                },
            ],
            [
                'label' => 'Vật liệu chính',
                'attribute' => 'vatlieuchinh',
                'value' => function ($model) {
                    return $model->loaikebaove->ten;
                },
            ],
                        [
                'label' => 'Loại móng kè',
                'attribute' => 'loaimongke',
                'value' => function ($model) {
                    return $model->mongke->ten;
                },
            ],
        ],
    ]) ?>

</div>
