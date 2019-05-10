<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauThietbicongcongtrencau */

$this->title = 'Cập nhật';// . $model->id_thietbicongcong;
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Thiết bị công cộng trên cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_thietbicongcong, 'url' => ['view', 'id' => $model->id_thietbicongcong]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cau-thietbicongcongtrencau-update">
    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
