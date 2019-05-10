<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKetcauduoiTru */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Cầu: Kết cấu dưới - Trụ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-ketcauduoi-tru-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
