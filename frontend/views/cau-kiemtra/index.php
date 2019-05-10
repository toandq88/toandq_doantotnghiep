<?php

use yii\helpers\Html;
use yii\grid\GridView;
use jino5577\daterangepicker\DateRangePicker; // add widget 

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CauKiemtraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Thông tin kiểm tra cầu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-kiemtra-index">
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
        //'options' => [ 'style' => 'table-layout:fixed;' ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_kiemtra',
            [
                'attribute' => 'id_cau',
                'value' => 'cau.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;']
            ],
            //Lấy tên đơn vị kiểm tra
            [
                'attribute' => 'id_donvikiemtra',
                'value' => 'donvi.tenviettat',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
            ],
            [
                'attribute' => 'ngaykiemtra',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                //'format' => ['date', 'php: d/m/Y']
                'value' => function ($model) {
                        if (extension_loaded('intl')) {
                                return Yii::t('app', '{0, date, MMMM dd, YYYY HH:mm}', [$model->ngaykiemtra]);
                        } else {
                                return date_format(date_create($model->ngaykiemtra), 'd/m/Y');
                        }
                },

                // here we render the widget
                'filter' => DateRangePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'created_at_range',
                        'pluginOptions' => [
                            'format' => 'd-m-y',
                            'autoUpdateInput' => false,
                        ]
                ]),
            ],
            //Lấy tên mức độ kiểm tra
            [
                'attribute' => 'id_mucdokiemtra',
                'value' => 'mucdo.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'ketluan',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
                'format' => 'html',
                'value' => function ($model) {
                    return Yii::$app->toandq->_substr($model->ketluan, 100);
                },
            ],
            [
                'attribute' => 'cansuachua',
                'label' => 'Tình trạng',
                'format' => 'raw',
                'value' => function($model) {
                    if ($model->cansuachua == 1) {
                        return Html::a(Html::img('@web/toandq/images/icon-danger.png', ['alt'=>'Cầu hư hỏng', 'title'=>'Cầu cần bảo trì / sửa chữa', 'width'=>'20px']), ['cau-baotri/create', 'id_check' => $model->id_kiemtra, 'id_bridge' => $model->id_cau],['title' => 'Cập nhật thông tin bảo trì / sửa chữa']);
                    } else if ($model->cansuachua == 0) {
                        return Html::img('@web/toandq/images/icon-ok.png', ['alt'=>'Cầu tốt', 'title'=>'Cầu không cần bảo trì / sửa chữa', 'width'=>'20px']);
                    } else {
                        return Html::img('@web/toandq/images/icon-danger-blue.png', ['alt'=>'Cầu đã được bảo trì / sửa chữa', 'title'=>'Cầu đã được bảo trì / sửa chữa', 'width'=>'20px']);
                    }
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Giá trị 0, 1, 2'
                ],
            ],
            //'nguoitao',
            [
                'attribute' => 'ngaytao',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'format' => ['date', 'php: H:i:s d/m/Y']
            ],
            //'nguoisua',
            //'ngaysua',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align:center'],
                'headerOptions' => ['style' => 'text-align:center'],
                'header' => 'Thao tác',
                'template' => '{view} {update} {delete} {download}',
                'visibleButtons' => [
                    'update' => function ($model) {
                        return $model->cansuachua != 2 ? true : false;
                    },
                    'delete' => function ($model) {
                        return $model->cansuachua != 2 ? true : false;
                    },
                    'download' => function ($model) {
                        return $model->cansuachua == 1 ? true : false;
                    }
                ],
                'buttons' => [
                    'download' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-cog"></span>',
                            ['cau-baotri/create', 'id_check' => $model->id_kiemtra, 'id_bridge' => $model->id_cau], 
                            [
                                'title' => 'Bảo trì / sửa chữa',
                                'data-pjax' => '0',
                            ]
                        );
                    },
                ],
            ],
        ],
        'pager' => [
            'firstPageLabel' => 'Trang đầu',
            'lastPageLabel' => 'Trang cuối',
        ],
    ]);
    ?>
</div>
