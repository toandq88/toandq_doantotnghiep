<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\VnXa */

$this->title = 'Xã / Phường '.$model->ten;
$this->params['breadcrumbs'][] = ['label' => 'Xã / Phường', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten, 'url' => ['view', 'id' => $model->id_xa]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="vn-xa-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
