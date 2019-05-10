<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TuyenduongSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản lý thông tin tuyến đường';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tuyenduong-index">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['create'], ['class' => 'glyphicon glyphicon-plus-sign btn btn-primary']) ?>
        </div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_tuyenduong',
            [
                'attribute' => 'mahieu',
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            'tenduong',
            [
                'attribute' => 'capduong',
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            //Đơn vị quản lý
            [
                'attribute' => 'id_donviquanly',
                'value' => 'donvi.tenviettat',
            ],
            //'tukmchinh',
            //'tukmle',
            //'denkmchinh',
            //'denkmle',
            //'vidodau',
            //'kinhdodau',
            //'vidocuoi',
            //'kinhdocuoi',
            [
                'attribute' => 'chieudaithucte',
                'label' => 'Chiều dài thực tế',
                'value' => function($model) {
                    return $model->chieudaithucte . ' km';
                },
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'namhoanthanhxaydung',
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'solanxecogioi',
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'tocdothietke',
                'value' => function($model) {
                    return $model->tocdothietke . ' (km/h)';
                },
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            //'nguoitao',
            //'ngaytao',
            //'nguoisua',
            //'ngaysua',
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
