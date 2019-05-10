<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauThongtinduungluc */

$this->title = 'Chi tiết thông tin';//$model->id_thongtinduungluc;
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Thông tin dự ứng lực', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cau-thongtinduungluc-view">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['update', 'id' => $model->id_thongtinduungluc], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php
            echo Html::a(' ', ['delete', 'id' => $model->id_thongtinduungluc], [
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
            //'id_thongtinduungluc',
            [
                'label' => 'Cầu',
                'attribute' => 'id_cau',
                'value' => function ($model) {
                    return $model->cau->ten;
                },
            ],
            'thutu',
            'bophanketcau',
            [
                'label' => 'Loại dự ứng lực',
                'attribute' => 'loaiduungluc',
                'value' => function ($model) {
                    return $model->duungluc->ten;
                },
            ],
            'ghichu',
        ],
    ]) ?>

</div>
