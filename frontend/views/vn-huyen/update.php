<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\VnHuyen */

$this->title = 'Quận/Huyện';
$this->params['breadcrumbs'][] = ['label' => 'Quận/Huyện', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten, 'url' => ['view', 'id' => $model->id_huyen]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="vn-huyen-update">
    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
