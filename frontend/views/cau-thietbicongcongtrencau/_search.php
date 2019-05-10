<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauThietbicongcongtrencauSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cau-thietbicongcongtrencau-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_thietbicongcong') ?>

    <?= $form->field($model, 'id_cau') ?>

    <?= $form->field($model, 'thutu') ?>

    <?= $form->field($model, 'tenloai') ?>

    <?= $form->field($model, 'coquanchuquan') ?>

    <?php // echo $form->field($model, 'ghichu') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
