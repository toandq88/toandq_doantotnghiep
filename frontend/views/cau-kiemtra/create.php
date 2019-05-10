<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKiemtra */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Thông tin kiểm tra cầu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cau-kiemtra-create">
    <h4><?= Html::encode($this->title) ?></h4>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
