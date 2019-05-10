<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DonviSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donvi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_donvi') ?>

    <?= $form->field($model, 'ten') ?>

    <?= $form->field($model, 'tenviettat') ?>

    <?= $form->field($model, 'diachi') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'dienthoai') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'hinhanh') ?>

    <?php // echo $form->field($model, 'mota') ?>

    <?php // echo $form->field($model, 'ngaytao') ?>

    <?php // echo $form->field($model, 'loaidonvi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
