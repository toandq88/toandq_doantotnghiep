<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Donvi */

$this->title = 'Đơn vị: ' . $model->ten;
$this->params['breadcrumbs'][] = ['label' => 'Đơn vị', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten, 'url' => ['view', 'id' => $model->id_donvi]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="donvi-update">
    <h4><?= Html::encode($this->title) ?></h4>
    
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
