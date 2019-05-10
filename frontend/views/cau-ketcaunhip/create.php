<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKetcaunhip */

$this->title = 'Cầu - Kết cấu nhịp';
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Kết cấu nhịp', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Thêm mới';
?>
<div class="cau-ketcaunhip-create">

    <h4><?= Html::encode($this->title) ?></h4>
    <br/>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
