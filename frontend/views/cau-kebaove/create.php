<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKebaove */

$this->title = 'Thêm mới thông tin';
$this->params['breadcrumbs'][] = ['label' => 'Cầu - Kè bảo vệ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-kebaove-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
