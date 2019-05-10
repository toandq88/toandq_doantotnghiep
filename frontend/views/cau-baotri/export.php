<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use jino5577\daterangepicker\DateRangePicker; // add widget 

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CauBaotriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Báo cáo Thông tin bảo trì cầu';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss("#w0-cols{display: block;} .btn-default{background: #28d;}");
$this->registerCss(".btn{border-radius: 4px; font-size: 10px; padding: 6px;}");

$this->registerJs(
    "$('#w1-cols').on('click', function() { $('.kv-checkbox-list').toggle(); });"
);
?>
<div class="cau-baotri-index">
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
                    'headerOptions' => [ 'style' => 'text-align:center;'],
                    'contentOptions' => [ 'style' => 'text-align:left;']
                ],
                [
                    'attribute' => 'id_kiemtra',
                    'label' => 'Đợt kiểm tra',
                    'headerOptions' => [ 'style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:center;'],
                    'value' => function($model) {
                if ($model->id_kiemtra != '') {
                    return 'Ngày: ' . date_format(date_create($model->dotkiemtra->ngaykiemtra), 'd/m/Y');
                }
            },
                ],
                [
                    'attribute' => 'ngaybatdau',
                    'headerOptions' => [ 'style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:center;'],
                    'format' => ['date', 'php: d/m/Y']
                ],
                [
                    'attribute' => 'ngayketthuc',
                    'headerOptions' => [ 'style' => 'text-align:center;'],
                    'contentOptions' => [ 'style' => 'text-align:center;'],
                    'format' => ['date', 'php: d/m/Y']
                ],
                //Lấy tên mức độ bảo trì
                [
                    'attribute' => 'id_mucdobaotri',
                    'value' => 'mucdo.ten_mucdo',
                    'headerOptions' => ['style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:center;'],
                ],
                [
                    'attribute' => 'noidung',
                    'headerOptions' => ['style' => 'text-align:center; width: 50%;'],
                    'contentOptions' => ['style' => 'text-align:center;'],
                    'format' => 'html',
                ],
                [
                    'attribute' => 'giatri',
                    'label' => 'Giá trị',
                    'value' => function($model) {
                        return number_format($model->giatri);
                    },
                    'headerOptions' => [ 'style' => 'text-align:center;'],
                    'contentOptions' => [ 'style' => 'text-align:center;'],
                ],
                //Lấy tên đơn vị thực hiện
                [
                    'attribute' => 'id_donvithuchien',
                    'value' => 'donvi.ten',
                    'headerOptions' => [ 'style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:left;'],
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
            //'id_baotri',
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
            [
                'attribute' => 'id_kiemtra',
                'label' => 'Đợt kiểm tra',
                'headerOptions' => [ 'style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function($model) {
                    if ($model->id_kiemtra != '') {
                        return 'Ngày: ' . date_format(date_create($model->dotkiemtra->ngaykiemtra), 'd/m/Y');
                    }
                },
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'yyyy-mm-dd',
                ],
            ],
            [
                'attribute' => 'ngaybatdau',
                'headerOptions' => [ 'style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                //'format' => [ 'date', 'php: d/m/Y']
                'value' => function ($model) {
                        if (extension_loaded('intl')) {
                                return Yii::t('app', '{0, date, MMMM dd, YYYY HH:mm}', [$model->ngaybatdau]);
                        } else {
                                return date_format(date_create($model->ngaybatdau), 'd/m/Y');
                        }
                },

                // here we render the widget
                'filter' => DateRangePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'created_at_range',
                        'pluginOptions' => [
                        'format' => 'd-m-Y',
                        'autoUpdateInput' => false
                    ]
                ])
            ],
            [
                'attribute' => 'ngayketthuc',
                'headerOptions' => [ 'style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                //'format' => ['date', 'php: d/m/Y']
                'value' => function ($model) {
                        if (extension_loaded('intl')) {
                                return Yii::t('app', '{0, date, MMMM dd, YYYY HH:mm}', [$model->ngayketthuc]);
                        } else {
                                return date_format(date_create($model->ngayketthuc), 'd/m/Y');
                        }
                },

                // here we render the widget
                'filter' => DateRangePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'created_at_range2',
                        'pluginOptions' => [
                        'format' => 'd-m-Y',
                        'autoUpdateInput' => false
                    ]
                ])
            ],
            //Lấy tên mức độ bảo trì
            [
                'attribute' => 'id_mucdobaotri',
                'value' => 'mucdo.ten_mucdo',
                'headerOptions' => [ 'style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            /*[
                'attribute' => 'noidung',
                'format' => 'html',
//                'headerOptions' => ['style' => 'text-align:center;'],
//                'contentOptions' => ['style' => 'text-align:center;']
            ],*/
            [
                'attribute' => 'giatri',
                'label' => 'Giá trị',
                'value' => function($model) {
                    return number_format($model->giatri). ' VNĐ';
                },
                'headerOptions' => [ 'style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:right;'],
            ],
            //Lấy tên đơn vị thực hiện
            [
                'attribute' => 'id_donvithuchien',
                'value' => 'donvi.tenviettat',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Tên viết tắt',
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
