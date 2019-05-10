<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKetcaunhipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cau-ketcaunhip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ketcaunhip') ?>

    <?= $form->field($model, 'id_cau') ?>

    <?= $form->field($model, 'kyhieunhip') ?>

    <?= $form->field($model, 'doccau_sodoketcau') ?>

    <?= $form->field($model, 'doccau_dangketcau') ?>

    <?php // echo $form->field($model, 'doccau_chieudainhip') ?>

    <?php // echo $form->field($model, 'doccau_culytimgoi') ?>

    <?php // echo $form->field($model, 'doccau_loaivuot') ?>

    <?php // echo $form->field($model, 'doccau_loaimatduongtrencau') ?>

    <?php // echo $form->field($model, 'doccau_vatlieuduongbohanh') ?>

    <?php // echo $form->field($model, 'doccau_vatlieulancantayvin') ?>

    <?php // echo $form->field($model, 'ngangcau_dangdamchu') ?>

    <?php // echo $form->field($model, 'ngangcau_sodamchu') ?>

    <?php // echo $form->field($model, 'ngangcau_culydam') ?>

    <?php // echo $form->field($model, 'ngangcau_chieucaodamchu') ?>

    <?php // echo $form->field($model, 'ngangcau_dangdamngang') ?>

    <?php // echo $form->field($model, 'ngangcau_dangdamdocphu') ?>

    <?php // echo $form->field($model, 'ngangcau_loaibanmatcau') ?>

    <?php // echo $form->field($model, 'ngangcau_dangketcauvom') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
