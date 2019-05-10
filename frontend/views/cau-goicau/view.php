<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauGoicau */

$this->title = 'Chi tiết thông tin gối cầu';//$model->id_goicau;
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Gối cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cau-goicau-view">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['update', 'id' => $model->id_goicau], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php
            echo Html::a(' ', ['delete', 'id' => $model->id_goicau], [
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
            //'id_goicau',
            [
                'label' => 'Cầu',
                'attribute' => 'id_cau',
                'value' => function ($model) {
                    return $model->cau->ten;
                },
            ],
            'thutu',
            'trennhip',
            'trenmotru',
            [
                'label' => 'Dạng liên kết',
                'attribute' => 'danglienket',
                'value' => function ($model) {
                    return $model->loaidanglienket->ten;
                },
            ],
            [
                'label' => 'Vật liệu',
                'attribute' => 'vatlieu',
                'value' => function ($model) {
                    return $model->loaivatlieu->ten;
                },
            ],
            'ghichu',
        ],
    ]) ?>

</div>
