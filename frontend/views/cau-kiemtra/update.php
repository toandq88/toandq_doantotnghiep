<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKiemtra */

$this->title = 'Thông tin kiểm tra cầu';
$this->params['breadcrumbs'][] = ['label' => 'Thông tin kiểm tra cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kiemtra, 'url' => ['view', 'id' => $model->id_kiemtra]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cau-kiemtra-update">

    <h4><?= Html::encode($this->title) ?></h4>
    <br/>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
