<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauHinhanh */

$this->title = 'Cầu - Hình ảnh';// . $model->id_hinhanh;
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Hình ảnh', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_hinhanh, 'url' => ['view', 'id' => $model->id_hinhanh]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cau-hinhanh-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
