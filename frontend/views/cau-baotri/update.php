<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauBaotri */

$this->title = 'Cập nhật thông tin bảo trì cầu: ' . $model->id_baotri;
$this->params['breadcrumbs'][] = ['label' => 'Thông tin bảo trì cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_baotri, 'url' => ['view', 'id' => $model->id_baotri]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cau-baotri-update">
    <h4><?= Html::encode($this->title) ?></h4>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
