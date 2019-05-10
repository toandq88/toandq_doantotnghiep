<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Donvi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donvi-form">
    <div class="row">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="col-lg-6">
            <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'tenviettat')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'diachi')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'dienthoai')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'hinhanh')->fileInput() ?>
        </div>
        <div class="col-lg-6">
            <?=
            $form->field($model, 'loaidonvi')->dropdownList(
                    [
                '1' => ' - Đơn vị chủ quản',
                '2' => ' - Đơn vị quản lý, vận hành',
                '3' => ' - Đơn vị xây dựng, bảo trì',
                    ], ['prompt' => '--- Chọn loại ---']
            )
            ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'mota')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="row" style="margin-top: 20px; text-align: center">
        <div class="form-group">
            <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
