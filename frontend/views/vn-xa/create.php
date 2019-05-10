<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\VnXa */

$this->title = 'Xã / Phường';
$this->params['breadcrumbs'][] = ['label' => 'Xã / Phường', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Thêm mới';
?>
<div class="vn-xa-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
