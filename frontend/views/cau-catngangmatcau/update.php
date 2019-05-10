<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauCatngangmatcau */

$this->title = 'Cập nhật';// . $model->id_catngangmatcau;
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Cắt ngang mặt cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_catngangmatcau, 'url' => ['view', 'id' => $model->id_catngangmatcau]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cau-catngangmatcau-update">
    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
