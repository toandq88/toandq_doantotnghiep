<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\VnHuyen */

$this->title = $model->ten;
$this->params['breadcrumbs'][] = ['label' => 'Quận / Huyện', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vn-huyen-view">
    <div class="row">
        <div class="col-lg-6">
            <h4>Quận / Huyện: <?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?php // Html::a(' ', ['update', 'id' => $model->id_huyen], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php /*
            echo Html::a(' ', ['delete', 'id' => $model->id_huyen], [
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
            'id_huyen',
            'ten',
            'loai',
            'vitri',
            [
                'label' => 'Thuộc tỉnh / thành phố',
                'attribute' => 'id_tinh',
                'value' => function ($model) {
                    return $model->tinh->ten;
                },
            ],
        ],
    ]) ?>

</div>
