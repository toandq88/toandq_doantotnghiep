<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\MucDoKiemTra */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Mức độ kiểm tra cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muc-do-kiem-tra-create">

    <h4><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
