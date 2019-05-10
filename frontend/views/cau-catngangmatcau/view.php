<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauCatngangmatcau */

$this->title = 'Thông tin chi tiết';//$model->id_catngangmatcau;
$this->params['breadcrumbs'][] = ['label' => 'Cắt ngang mặt cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cau-catngangmatcau-view">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['update', 'id' => $model->id_catngangmatcau], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php
            echo Html::a(' ', ['delete', 'id' => $model->id_catngangmatcau], [
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
            //'id_catngangmatcau',
            [
                'label' => 'Cầu',
                'attribute' => 'id_cau',
                'value' => function ($model) {
                    return $model->cau->ten;
                },
            ],
            'nhipcungdang',
            'chieurongtoancau',
            'phanxechay_chieurong',
            'phanxechay_solanxe',
            'phancach_berongphancachgiua',
            'phancach_berongphancachbien',
            'duongbohanh_berong',
            'duongbohanh_beronglancan',
        ],
    ]) ?>

</div>
