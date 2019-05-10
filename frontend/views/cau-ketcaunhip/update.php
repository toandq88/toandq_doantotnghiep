<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKetcaunhip */

$this->title = 'Cập nhật thông tin kết cấu nhịp ';
$this->params['breadcrumbs'][] = ['label' => 'Kết cấu nhịp', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ketcaunhip, 'url' => ['view', 'id' => $model->id_ketcaunhip]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cau-ketcaunhip-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
