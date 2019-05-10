<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MucDoBaoTriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Muc Do Bao Tris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muc-do-bao-tri-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Muc Do Bao Tri', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_mucdo',
            'ten_mucdo',
            'thutu',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
