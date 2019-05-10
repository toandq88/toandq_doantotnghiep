<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauThongtinduungluc */

$this->title = 'Cập nhật thông tin' ;//. $model->id_thongtinduungluc;
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Thông tin dự ứng lực', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_thongtinduungluc, 'url' => ['view', 'id' => $model->id_thongtinduungluc]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cau-thongtinduungluc-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
