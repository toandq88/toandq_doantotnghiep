<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cau */

$this->title = 'Cập nhật thông tin cầu: ' . $model->ten;
$this->params['breadcrumbs'][] = ['label' => 'Thông tin cầu đường bộ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten, 'url' => ['view', 'id' => $model->id_cau]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cau-update">

    <h3><?= Html::encode($this->title) ?></h3>
    <br/>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
