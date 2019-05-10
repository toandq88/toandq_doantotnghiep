<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\MucDoKiemTra */

$this->title = 'Cập nhật mức độ kiểm tra: '.$model->ten;
$this->params['breadcrumbs'][] = ['label' => 'Mức độ kiểm tra', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten, 'url' => ['view', 'id' => $model->id_mucdo]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="muc-do-kiem-tra-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
