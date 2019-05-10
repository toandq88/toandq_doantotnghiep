<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKebaoveSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cau-kebaove-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_kebaove') ?>

    <?= $form->field($model, 'id_cau') ?>

    <?= $form->field($model, 'thutu') ?>

    <?= $form->field($model, 'mota') ?>

    <?= $form->field($model, 'chieudai') ?>

    <?php // echo $form->field($model, 'chieucao') ?>

    <?php // echo $form->field($model, 'loaike') ?>

    <?php // echo $form->field($model, 'vatlieuchinh') ?>

    <?php // echo $form->field($model, 'loaimongke') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
