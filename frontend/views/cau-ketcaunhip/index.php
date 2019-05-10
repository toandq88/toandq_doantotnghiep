<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CauKetcaunhipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cầu - Kết cấu nhịp';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="cau-ketcaunhip-index">
    <div class="row">
        <div class="col-lg-6">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6" style="float: right; text-align: right">
            <?= Html::a(' ', ['create'], ['class' => 'glyphicon glyphicon-plus-sign btn btn-primary']) ?>
        </div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_ketcaunhip',
            [
                'attribute' => 'id_cau',
                'value' => 'cau.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;']
            ],
            [
                'attribute' => 'kyhieunhip',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
                'contentOptions' => ['style' => 'width:15%; white-space: normal;'],
            ],
            [
                'attribute' => 'doccau_sodoketcau',
                'value' => 'loaisodoketcau.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'doccau_chieudainhip',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'doccau_culytimgoi',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'doccau_dangketcau',
                'value' => 'loaidangketcau.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'doccau_loaivuot',
                'value' => 'loaivuot.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'doccau_loaimatduongtrencau',
                'value' => 'loaimatduongtrencau.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'doccau_vatlieuduongbohanh',
                'value' => 'loaivatlieuduongbohanh.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'doccau_vatlieulancantayvin',
                'value' => 'loaivatlieulancantayvin.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            //'ngangcau_dangdamchu',
            //'ngangcau_sodamchu',
            //'ngangcau_culydam',
            //'ngangcau_chieucaodamchu',
            //'ngangcau_dangdamngang',
            //'ngangcau_dangdamdocphu',
            //'ngangcau_loaibanmatcau',
            //'ngangcau_dangketcauvom',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align:center'],
                'headerOptions' => ['style' => 'text-align:center'],
                'header' => 'Thao tác',
                'template' => '{view} {update} {delete} ',
            ],
        ],
        'pager' => [
            'firstPageLabel' => 'Trang đầu',
            'lastPageLabel' => 'Trang cuối',
        ],
    ]); ?>
</div>
