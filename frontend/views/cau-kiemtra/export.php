<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use jino5577\daterangepicker\DateRangePicker; // add widget 

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CauKiemtraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Báo cáo Thông tin kiểm tra cầu';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss("#w0-cols{display: block;} .btn-default{background: #28d;}");
$this->registerCss(".btn{border-radius: 4px; font-size: 10px; padding: 6px;}");

$this->registerJs(
    "$('#w1-cols').on('click', function() { $('.kv-checkbox-list').toggle(); });"
);

?>
<div class="cau-kiemtra-index">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-lg-6 benphai">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="col-lg-6">
            <?php
            $gridColumns = [
                ['class' => 'kartik\grid\SerialColumn'],
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
                    'format' => ['date', 'php: d/m/Y']
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
                    'headerOptions' => ['style' => 'text-align:center; width: 30%;'],
                    'contentOptions' => ['style' => 'text-align:left;'],
                    'format' => 'html',
                    'value' => function ($model) {
                        return $model->ketluan;
                    },
                ],
                [
                    'attribute' => 'cansuachua',
                    'label' => 'Cần sửa chữa?',
                    'value' => function($model) {
                        if ($model->cansuachua == 1) {
                            return 'Có';
                        } else if ($model->cansuachua == 0) {
                            return 'Không';
                        } else {
                            return 'Có / Đã sửa chữa';
                        }
                    },
                    'headerOptions' => ['style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:center;'],
                ],
                [
                    'attribute' => 'ngaytao',
                    'headerOptions' => ['style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:center;'],
                    'format' => ['date', 'php: H:i:s d/m/Y']
                ],
                ['class' => 'kartik\grid\ActionColumn', 'urlCreator' => function() {
                        return '#';
                    }]
            ];

            echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'options' => [ 'style' => 'table-layout:fixed;' ],
                'exportConfig' => [
                    //ExportMenu::FORMAT_TEXT => false,
                    //ExportMenu::FORMAT_HTML => false,
                    //ExportMenu::FORMAT_EXCEL => false,
                    ExportMenu::FORMAT_PDF => false,
                    /*ExportMenu::FORMAT_PDF => [
                        'pdfConfig' => [
                            'methods' => [
                                'SetTitle' => 'Báo cáo Thông tin kiểm tra cầu',
                                'SetSubject' => 'Xuất file pdf',
                                'SetHeader' => ['Xuất bản||Ngày xuất bản: ' . date("r")],
                                'SetFooter' => ['|Trang {PAGENO}|'],
                                'SetAuthor' => 'toandq',
                                'SetCreator' => 'toandq',
                                'SetKeywords' => 'Yii2, Export, PDF, MPDF, Output, GridView, Grid, yii2-grid, yii2-mpdf, yii2-export',
                            ]
                        ]
                    ],*/
                ],
                    /* 'dropdownOptions' => [
                      'label' => 'Export All',
                      'class' => 'btn btn-secondary'
                      ] */
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
            //'id_kiemtra',
            [
                'attribute' => 'id_cau',
                'value' => 'cau.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Tên cầu',
                ],
            ],
            //Lấy tên đơn vị kiểm tra
            [
                'attribute' => 'id_donvikiemtra',
                'value' => 'donvi.tenviettat',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Tên viết tắt',
                ],
            ],
            [
                'attribute' => 'ngaykiemtra',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
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
                        'format' => 'dd-mm-YYYY',
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
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'vd: Thường xuyên, ...',
                ],
            ],
            [
                'attribute' => 'ketluan',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
                'format' => 'html',
                'value' => function ($model) {
                    return Yii::$app->toandq->_substr($model->ketluan, 50);
                },
            ],
            [
                'attribute' => 'cansuachua',
                'label' => 'Cần sửa chữa?',
                'value' => function($model) {
                    if ($model->cansuachua == 1) {
                        return 'Có';
                    } else if ($model->cansuachua == 0) {
                        return 'Không';
                    } else {
                        return 'Có / Đã sửa chữa';
                    }
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Giá trị 0, 1, 2'
                ],
            ],
            [
                'attribute' => 'ngaytao',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'format' => ['date', 'php: H:i:s d/m/Y']
            ],
        ],
        'pager' => [
            'firstPageLabel' => 'Trang đầu',
            'lastPageLabel' => 'Trang cuối',
        ],
    ]);
    ?>
</div>
