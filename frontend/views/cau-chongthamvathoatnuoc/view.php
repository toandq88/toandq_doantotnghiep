<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauChongthamvathoatnuoc */

$this->title = $model->id_chongtham;
$this->params['breadcrumbs'][] = ['label' => 'Cau Chongthamvathoatnuocs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cau-chongthamvathoatnuoc-view">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['update', 'id' => $model->id_chongtham], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php
            echo Html::a(' ', ['delete', 'id' => $model->id_chongtham], [
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
            'id_chongtham',
            'id_cau',
            'thutu',
            'vitri',
            'ghichu',
        ],
    ]) ?>

</div>
