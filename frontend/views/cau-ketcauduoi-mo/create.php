<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKetcauduoiMo */

$this->title = ' Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Kết cấu dưới - mố', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-ketcauduoi-mo-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
