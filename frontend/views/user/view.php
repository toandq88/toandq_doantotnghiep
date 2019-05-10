<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Người dùng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['update', 'id' => $model->id], ['class' => 'glyphicon glyphicon-pencil btn btn-primary']) ?>
            <?php
            if ($u_sum == 0) {
                echo Html::a(' ', ['delete', 'id' => $model->id], [
                    'class' => 'glyphicon glyphicon-trash btn btn-danger',
                    'data' => [
                        'confirm' => 'Bạn có chắc chắn muốn xóa thông tin này?',
                        'method' => 'post',
                    ],
                ]);
            }
            ?>
        </div>
    </div>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'username',
            'name',
            'email:email',
            'phone',
            [
                'attribute' => 'status',
                'label' => 'Tình trạng',
                'value' => function($model) {
                    if ($model->status == 1) {
                        return 'Hoạt động';
                    } else {
                        return 'Không hoạt động';
                    }
                }
            ],
            'created_at:datetime',
            'updated_at:datetime',
            [
                'label' => 'Thuộc Đơn vị',
                'attribute' => 'id_donvi',
                'value' => function ($model) {
                    return $model->donvi->ten;
                },
            ],
        ],
    ])
    ?>

</div>
