<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKhecogian */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Khe co giãn', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-khecogian-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
