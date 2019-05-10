<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\MucDoBaoTri */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Mức độ bảo trì cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muc-do-bao-tri-create">
    <h4><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
