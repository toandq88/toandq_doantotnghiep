<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản lý người dùng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['site/signup'], ['class' => 'glyphicon glyphicon-plus-sign btn btn-primary']) ?>
        </div>
    </div>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
                'attribute' => 'username',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
            ],
            [
                'attribute' => 'name',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
            ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            [
                'attribute' => 'email',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
                'format' => 'email',
            ],
            [
                'attribute' => 'phone',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'status',
                'label' => 'Tình trạng',
                'contentOptions' => ['style' => 'text-align:center'],
                'headerOptions' => ['style' => 'text-align:center'],
                'format' => 'raw',
                'value' => function($model) {
            if ($model->status == 1) {
                return Html::img('@web/toandq/images/icon-ok.png', ['alt' => 'Hoạt động', 'title' => 'Tài khoản đang hoạt động', 'width' => '20px']);
            } else {
                return Html::img('@web/toandq/images/icon-inactive2.png', ['alt' => 'Không hoạt động', 'title' => 'Tài khoản không hoạt động', 'width' => '20px']);
            }
        },
                'filterInputOptions' => [
                    'class' => 'form-control',
                    'placeholder' => '1-Active; 0 - inActive'
                ],
            ],
            [
                'attribute' => 'created_at',
                'label' => 'Ngày tạo',
                'contentOptions' => ['style' => 'text-align:center'],
                'headerOptions' => ['style' => 'text-align:center'],
                'format' => ['date', 'php: H:i:s d/m/Y']
            ],
            [
                'attribute' => 'updated_at',
                'label' => 'Ngày cập nhật',
                'contentOptions' => ['style' => 'text-align:center'],
                'headerOptions' => ['style' => 'text-align:center'],
                'format' => ['date', 'php: H:i:s d/m/Y']
            ],
            //'updated_at',
            //'id_donvi',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align:center'],
                'headerOptions' => ['style' => 'text-align:center'],
                'header' => 'Thao tác',
                'template' => '{view} {update} ',
            ],
        ],
        'pager' => [
            'firstPageLabel' => 'Trang đầu',
            'lastPageLabel' => 'Trang cuối',
        ],
    ]);
    ?>
</div>
