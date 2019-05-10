<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Donvi */

$this->title = 'Đơn vị';
$this->params['breadcrumbs'][] = ['label' => 'Đơn vị', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Thêm mới';
?>
<div class="donvi-create">
    <h4><?= Html::encode($this->title) ?></h4>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
