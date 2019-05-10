<?php

use yii\helpers\Html;
use yii\grid\GridView;
use jino5577\daterangepicker\DateRangePicker; // add widget 

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CauLichsuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ghi chú lịch sử cầu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-lichsu-index">
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
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            //'id',
            [
                'attribute' => 'id_cau',
                'value' => 'cau.ten',
                'headerOptions' => ['style' => 'text-align:center; width: 15%;'],
                'contentOptions' => ['style' => 'text-align:left;']
            ],
            [
                'attribute' => 'ngaythangnam',
                'headerOptions' => ['style' => 'text-align:center; width: 15%;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                //'format' => ['date', 'php: d/m/Y']
                'value' => function ($model) {
                        if (extension_loaded('intl')) {
                                return Yii::t('app', '{0, date, MMMM dd, YYYY HH:mm}', [$model->ngaythangnam]);
                        } else {
                                return date_format(date_create($model->ngaythangnam), 'd/m/Y');
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
            [
                'attribute' => 'noidung',
                'headerOptions' => ['style' => 'text-align:center; width: 60%;'],
                'contentOptions' => ['style' => 'text-align:left;'],
                'format' => 'html',
                'value' => function ($model) {
                    return Yii::$app->toandq->_substr($model->noidung, 100);
                },
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
    ]);
    ?>
</div>
