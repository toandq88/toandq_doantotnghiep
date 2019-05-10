<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauGoicauSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cau-goicau-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_goicau') ?>

    <?= $form->field($model, 'id_cau') ?>

    <?= $form->field($model, 'thutu') ?>

    <?= $form->field($model, 'trennhip') ?>

    <?= $form->field($model, 'trenmotru') ?>

    <?php // echo $form->field($model, 'danglienket') ?>

    <?php // echo $form->field($model, 'vatlieu') ?>

    <?php // echo $form->field($model, 'ghichu') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
