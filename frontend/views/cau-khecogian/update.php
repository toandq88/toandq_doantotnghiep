<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKhecogian */

$this->title = 'Cập nhật ';// . $model->id_khecogian;
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Khe co giãn', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_khecogian, 'url' => ['view', 'id' => $model->id_khecogian]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cau-khecogian-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
