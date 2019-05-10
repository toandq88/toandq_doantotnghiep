<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKetcauduoiMo */

$this->title = 'Cập nhật thông tin kết cấu dưới - mố ';// . $model->id_ketcauduoimo;
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Kết cấu dưới - mố', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ketcauduoimo, 'url' => ['view', 'id' => $model->id_ketcauduoimo]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cau-ketcauduoi-mo-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
