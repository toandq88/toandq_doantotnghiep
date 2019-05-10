<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MucDoKiemTra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="muc-do-kiem-tra-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-lg-6">
            <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?=
            $form->field($model, 'thutu')->dropDownList([
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '8',
                '9' => '9',
                '10' => '10',
            ])
            ?>
        </div>
    </div>
    <div class="row" style="margin-top: 20px; text-align: center">
        <div class="form-group">
            <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
