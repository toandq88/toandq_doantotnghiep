<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauThietbicongcongtrencau */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Thiết bị công cộng trên cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-thietbicongcongtrencau-create">
    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
