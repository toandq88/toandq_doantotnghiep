<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Donvi;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tuyenduong */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tuyenduong-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-lg-6">
            <?= $form->field($model, 'tenduong')->textInput(['maxlength' => true,]) ?>
        </div>
        <div class="col-lg-6">
            <?=
            $form->field($model, 'id_donviquanly')->dropDownList(
                    ArrayHelper::map(Donvi::find()->where(['loaidonvi' => 2])->all(), 'id_donvi', 'ten'), ['prompt' => " -- Chọn đơn vị --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'mahieu')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'capduong')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'tukmchinh')->textInput(['class' => 'form-control', 'placeholder' => "Từ km chính"]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'tukmle')->textInput(['class' => 'form-control', 'placeholder' => "+ km lẻ"]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'denkmchinh')->textInput(['class' => 'form-control', 'placeholder' => "Đến km chính"]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'denkmle')->textInput(['class' => 'col-lg-3 form-control', 'placeholder' => "+ km lẻ"]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'vidodau')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => "21.111111"]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'kinhdodau')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => "105.111111"]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'vidocuoi')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => "21.222222"]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'kinhdocuoi')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => "105.222222"]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'chieudaithucte')->textInput(['class' => 'form-control']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'namhoanthanhxaydung')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => "yyyy"]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'solanxecogioi')->textInput(['class' => 'form-control']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'tocdothietke')->textInput(['class' => 'form-control']) ?>
        </div>
    </div>
    <div class="row" style="margin-top: 20px; text-align: center">
        <div class="form-group">
            <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
