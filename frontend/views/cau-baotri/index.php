<?php

use yii\helpers\Html;
use yii\grid\GridView;
use jino5577\daterangepicker\DateRangePicker; // add widget 

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CauBaotriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Thông tin bảo trì cầu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-baotri-index">
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
            //'id_baotri',
            [
                'attribute' => 'id_cau',
                'value' => 'cau.ten',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;']
            ],
            [
                'attribute' => 'id_kiemtra',
                'label' => 'Đợt kiểm tra',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function($model) {
                    if($model->id_kiemtra != '')
                    {
                        return 'Ngày: ' . date_format(date_create($model->dotkiemtra->ngaykiemtra), 'd/m/Y');
                    }
                },
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'yyyy-mm-dd'
                ],
            ],
            [
                'attribute' => 'ngaybatdau',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                //'format' => ['date', 'php: d/m/Y']
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
                'headerOptions' => ['style' => 'text-align:center;'],
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
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
//            [
//                'attribute' => 'noidung',
//                'headerOptions' => ['style' => 'text-align:center;'],
//                'contentOptions' => ['style' => 'text-align:center;']
//            ],
            [
                'attribute' => 'giatri',
                'label' => 'Giá trị',
                'value' => function($model) {
                    return number_format($model->giatri);
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            //Lấy tên đơn vị thực hiện
            [
                'attribute' => 'id_donvithuchien',
                'value' => 'donvi.tenviettat',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
            ],
            //'file',
            //'nguoitao',
            //'ngaytao',
            //'nguoisua',
            //'ngaysua',
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
    ]);
    ?>
</div>
