<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\MucDoBaoTri */

$this->title = 'Cập nhật mức độ bảo trì: ' . $model->ten_mucdo;
$this->params['breadcrumbs'][] = ['label' => 'Mức độ bảo trì', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten_mucdo, 'url' => ['view', 'id' => $model->id_mucdo]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="muc-do-bao-tri-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
