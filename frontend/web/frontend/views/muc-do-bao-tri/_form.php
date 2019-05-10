<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MucDoBaoTri */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="muc-do-bao-tri-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten_mucdo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thutu')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
