<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cau */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-create">

    <h3><?= Html::encode($this->title) ?></h3>
    <br/>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
