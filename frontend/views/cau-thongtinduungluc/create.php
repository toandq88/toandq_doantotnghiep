<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauThongtinduungluc */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Thông tin dự ứng lực', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-thongtinduungluc-create">
    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
