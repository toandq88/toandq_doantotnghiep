<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\VnXa */

$this->title = $model->ten;
$this->params['breadcrumbs'][] = ['label' => 'Xã / Phường', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vn-xa-view">
    <div class="row">
        <div class="col-lg-6">
            <h4>Xã / Phường: <?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?php // Html::a(' ', ['update', 'id' => $model->id_xa], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php /*
            echo Html::a(' ', ['delete', 'id' => $model->id_xa], [
                'class' => 'glyphicon glyphicon-trash btn btn-danger',
                'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                'method' => 'post',
                ],
                ]); */
            ?>
        </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_xa',
            'ten',
            'loai',
            'vitri',
            [
                'label' => 'Thuộc huyện',
                'attribute' => 'id_huyen',
                'value' => function ($model) {
                    return $model->huyen->ten;
                },
            ],
        ],
    ]) ?>

</div>
