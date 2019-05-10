<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\CauLoai */

$this->title = 'Thông tin chung';
$this->params['breadcrumbs'][] = ['label' => 'Thông tin chung', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Thêm mới';
?>
<div class="cau-loai-create">
    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
