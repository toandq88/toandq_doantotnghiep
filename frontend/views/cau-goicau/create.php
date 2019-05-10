<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauGoicau */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Gối cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-goicau-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
