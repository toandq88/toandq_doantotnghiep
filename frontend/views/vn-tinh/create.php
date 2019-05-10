<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\VnTinh */

$this->title = 'Tỉnh / Thành phố';
$this->params['breadcrumbs'][] = ['label' => 'Tỉnh / Thành phố', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Thêm mới';
?>
<div class="vn-tinh-create">
    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
