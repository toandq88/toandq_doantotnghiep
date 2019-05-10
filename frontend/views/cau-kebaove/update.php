<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKebaove */

$this->title = 'Cập nhật thông tin';// . $model->id_kebaove;
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Kè bảo vệ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kebaove, 'url' => ['view', 'id' => $model->id_kebaove]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cau-kebaove-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
