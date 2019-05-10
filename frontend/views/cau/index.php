<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CauSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Thông tin cầu đường bộ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-index">
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
//            [
//                'attribute' => 'tensongsuoi',
//                'headerOptions' => ['style' => 'text-align:center;'],
//                'contentOptions' => ['style' => 'text-align:center;']
//            ],
            [
                'attribute' => 'kmchinh',
                'label' => 'Lý trình',
                'value' => function($model) {
                    return 'Km' . $model->kmchinh . '+' . $model->kmle;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;']
            ],
            //'gocgiao',
            //'kmchinh',
            //'kmle',
            //'vido',
            //'kinhdo',
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
            //'id_xa',
            //'loailanduong',
            //'dangcau',
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
            //'berongphanxechay',
            //'berongphanbohanh',
            /* [
              'attribute' => 'taitrongthietke',
              'value' => 'loaitaitrongthietke.ten',
              'headerOptions' => ['style' => 'text-align:center;'],
              'contentOptions' => ['style' => 'text-align:center;']
              ],
              [
              'attribute' => 'theoquytrinh',
              'value' => 'loaiquytrinhthietke.ten',
              'headerOptions' => ['style' => 'text-align:center;'],
              'contentOptions' => ['style' => 'text-align:center;']
              ], */
            //'namxaydung',
            //'taitrongkhaithac',
            //'namduavaokhaithac',
            //'chaychungvoi_duongsat',
            //'chaychungvoi_congtrinhthuyloi',
            //'donvixaydungcau',
            //'tinhkhong_vemuakho',
            //'tinhkhong_vemualu',
            //'tinhkhong_codinh',
            //'tinhkhong_thongthuyen',
            //'tinhkhong_trencau',
            //'bienbao_tencau',
            //'bienbao_taitrong',
            //'bienbao_tocdo',
            //'bienbao_culyxe',
            //'bienbao_chieucao',
            //'bienbao_chieurong',
            //'bienbao_khac',
            //'dongchay_thuytrieu',
            //'dongchay_nhiemman',
            //'dongchay_lulut',
            //'dongchay_thongthuyen',
            //'dongchay_capsong',
            //'dongchay_thoikylu',
            //'file',
            //'ghichu:ntext',
            //'nguoitao',
            //'ngaytao',
            //'nguoisua',
            //'ngaysua',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align:center'],
                'headerOptions' => ['style' => 'text-align:center'],
                'header' => 'Thao tác',
                'template' => '{view} {update}',
            ],
        ],
        'pager' => [
            'firstPageLabel' => 'Trang đầu',
            'lastPageLabel' => 'Trang cuối',
            'maxButtonCount' => 5,
            //'prevPageLabel' => '<span class="glyphicon glyphicon-chevron-left"></span>',
            //'nextPageLabel' => '<span class="glyphicon glyphicon-chevron-right"></span>',
        ],
    ]);
    ?>
</div>
