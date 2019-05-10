<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tuyenduong */

$this->title = 'Tuyến đường: '.$model->tenduong;
$this->params['breadcrumbs'][] = ['label' => 'Tuyến đường', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tenduong, 'url' => ['view', 'id' => $model->id_tuyenduong]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="tuyenduong-update">
    <h4><?= Html::encode($this->title) ?></h4>
    <br/>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
