<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CauKebaoveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cầu - Kè bảo vệ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-kebaove-index">
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

            //'id_kebaove',
            [
                'attribute' => 'id_cau',
                'value' => 'cau.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;']
            ],
            [
                'attribute' => 'thutu',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;']
            ],
            [
                'attribute' => 'mota',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;']
            ],
            [
                'attribute' => 'chieudai',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;']
            ],
            [
                'attribute' => 'chieucao',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;']
            ],
            [
                'attribute' => 'loaike',
                'value' => 'loaikebaove.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;']
            ],
            [
                'attribute' => 'vatlieuchinh',
                'value' => 'loaivatlieu.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;']
            ],
            [
                'attribute' => 'loaimongke',
                'value' => 'mongke.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;']
            ],

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
