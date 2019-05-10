<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CauSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Báo cáo Thông tin cầu';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss("#w0-cols{display: block;} .btn-default{background: #28d;}");
$this->registerCss(".btn{border-radius: 4px; font-size: 10px; padding: 6px;}");

$this->registerJs(
    "$('#w0-cols').on('click', function() { $('.kv-checkbox-list').toggle(); });"
);

?>
<div class="cau-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-lg-6 benphai">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6">
            <?php
            $gridColumns = [
                ['class' => 'kartik\grid\SerialColumn'],
                [
                    'attribute' => 'ten',
                    'headerOptions' => ['style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:left;']
                ],
                [
                    'attribute' => 'id_tuyenduong',
                    'value' => 'tuyenduong.mahieu',
                    'headerOptions' => ['style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:center;'],
                ],
                [
                    'attribute' => 'doituongvuot',
                    'value' => 'loaidoituongvuot.ten',
                    'headerOptions' => ['style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:center;']
                ],
                [
                    'attribute' => 'kmchinh',
                    'label' => 'Lý trình',
                    'value' => function($model) {
                        return 'Km' . $model->kmchinh . '+' . $model->kmle;
                    },
                    'headerOptions' => ['style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:center;']
                ],
                [
                    'attribute' => 'id_tinh',
                    'value' => 'vntinh.ten',
                    'headerOptions' => ['style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:center;'],
                ],
                [
                    'attribute' => 'id_huyen',
                    'value' => 'vnhuyen.ten',
                    'headerOptions' => ['style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:center;'],
                ],
                [
                    'attribute' => 'chieudai',
                    'headerOptions' => ['style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:center;'],
                    'value' => function($model) {
                return number_format($model->chieudai, 2, ',', '') . ' (m)';
            },
                ],
                [
                    'attribute' => 'sonhip',
                    'headerOptions' => ['style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:center;']
                ],
                [
                    'attribute' => 'berongcau',
                    'headerOptions' => ['style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:center;'],
                    'value' => function($model) {
                return number_format($model->berongcau, 2, ',', '') . ' (m)';
            },
                ],
                ['class' => 'kartik\grid\ActionColumn', 'urlCreator' => function() {
                        return '#';
                    }]
            ];

            echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
            ]);
            ?>
        </div>
    </div>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;']
            ],
            [
                'attribute' => 'id_tuyenduong',
                'value' => 'tuyenduong.mahieu',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            //'sohieu',
            [
                'attribute' => 'doituongvuot',
                'value' => 'loaidoituongvuot.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;']
            ],
            [
                'attribute' => 'kmchinh',
                'label' => 'Lý trình',
                'value' => function($model) {
                    return 'Km' . $model->kmchinh . '+' . $model->kmle;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;']
            ],
            [
                'attribute' => 'id_tinh',
                'value' => 'vntinh.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'id_huyen',
                'value' => 'vnhuyen.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'chieudai',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function($model) {
            return number_format($model->chieudai, 2, ',', '') . ' (m)';
        },
            ],
            [
                'attribute' => 'sonhip',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;']
            ],
            /* [
              'attribute' => 'sodonhip',
              'headerOptions' => ['style' => 'text-align:center;'],
              'contentOptions' => ['style' => 'text-align:center;']
              ], */
            [
                'attribute' => 'berongcau',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function($model) {
            return number_format($model->berongcau, 2, ',', '') . ' (m)';
        },
            ],
        ],
        'pager' => [
            'firstPageLabel' => 'Trang đầu',
            'lastPageLabel' => 'Trang cuối',
        ],
    ]);
    ?>
</div>
