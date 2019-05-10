<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauChongthamvathoatnuoc */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Chống thấm và thoát nước', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-chongthamvathoatnuoc-create">
    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
