<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\VnHuyen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vn-huyen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_huyen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vitri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tinh')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
