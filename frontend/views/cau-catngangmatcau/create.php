<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauCatngangmatcau */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Cắt ngang mặt cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-catngangmatcau-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
