<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauLoai */

$this->title = 'Thông tin chung về cầu';
$this->params['breadcrumbs'][] = ['label' => 'Thông tin chung', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_loai, 'url' => ['view', 'id' => $model->id_loai]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cau-loai-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
