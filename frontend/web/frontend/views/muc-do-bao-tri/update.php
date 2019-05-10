<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\MucDoBaoTri */

$this->title = 'Update Muc Do Bao Tri: ' . $model->id_mucdo;
$this->params['breadcrumbs'][] = ['label' => 'Muc Do Bao Tris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_mucdo, 'url' => ['view', 'id' => $model->id_mucdo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="muc-do-bao-tri-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
