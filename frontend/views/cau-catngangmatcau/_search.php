<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauCatngangmatcauSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cau-catngangmatcau-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_catngangmatcau') ?>

    <?= $form->field($model, 'id_cau') ?>

    <?= $form->field($model, 'nhipcungdang') ?>

    <?= $form->field($model, 'chieurongtoancau') ?>

    <?= $form->field($model, 'phanxechay_chieurong') ?>

    <?php // echo $form->field($model, 'phanxechay_solanxe') ?>

    <?php // echo $form->field($model, 'phancach_berongphancachgiua') ?>

    <?php // echo $form->field($model, 'phancach_berongphancachbien') ?>

    <?php // echo $form->field($model, 'duongbohanh_berong') ?>

    <?php // echo $form->field($model, 'duongbohanh_beronglancan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
