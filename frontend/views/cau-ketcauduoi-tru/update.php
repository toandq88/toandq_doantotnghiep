<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKetcauduoiTru */

$this->title = 'Cập nhật kết cấu dưới - Trụ';// . $model->id_ketcauduoitru;
$this->params['breadcrumbs'][] = ['label' => 'Kết cấu dưới - Trụ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ketcauduoitru, 'url' => ['view', 'id' => $model->id_ketcauduoitru]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cau-ketcauduoi-tru-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
