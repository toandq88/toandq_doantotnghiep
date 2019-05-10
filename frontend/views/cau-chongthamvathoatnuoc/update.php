<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauChongthamvathoatnuoc */

$this->title = 'Cập nhật' ;//. $model->id_chongtham;
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Chống thấm và thoát nước', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_chongtham, 'url' => ['view', 'id' => $model->id_chongtham]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cau-chongthamvathoatnuoc-update">
    <h4><?= Html::encode($this->title) ?></h4>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
