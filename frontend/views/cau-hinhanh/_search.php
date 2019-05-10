<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauHinhanhSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cau-hinhanh-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_hinhanh') ?>

    <?= $form->field($model, 'id_cau') ?>

    <?= $form->field($model, 'file') ?>

    <?= $form->field($model, 'loai') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
