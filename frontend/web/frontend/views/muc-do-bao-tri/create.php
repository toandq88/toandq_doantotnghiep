<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\MucDoBaoTri */

$this->title = 'Create Muc Do Bao Tri';
$this->params['breadcrumbs'][] = ['label' => 'Muc Do Bao Tris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muc-do-bao-tri-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
