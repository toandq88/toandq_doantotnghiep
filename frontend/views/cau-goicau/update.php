<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauGoicau */

$this->title = 'Cập nhật Gối cầu: ' . $model->id_goicau;
$this->params['breadcrumbs'][] = ['label' => 'Gối cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_goicau, 'url' => ['view', 'id' => $model->id_goicau]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cau-goicau-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
