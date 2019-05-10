<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauBaotriSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cau-baotri-search">
    <div class="row" style="margin-bottom: 20px;">
        <?php
        $form = ActiveForm::begin([
                    'action' => ['export'],
                    'method' => 'get',
        ]);
        ?>

        <?php // $form->field($model, 'id_baotri') ?>
        <div class="col-lg-3">
            <?= $form->field($model, 'id_cau')->textInput(['placeholder' => "Tên cầu"]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'created_at_range')->textInput(['placeholder' => "mm/dd/YYYY - mm/dd/YYYY"])->label('Thời gian bắt đầu',['class'=>'label-class']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'created_at_range2')->textInput(['placeholder' => "mm/dd/YYYY - mm/dd/YYYY"])->label('Thời gian kết thúc',['class'=>'label-class']) ?>
        </div>
        <div class="col-lg-3" style="padding-top: 24px;">
            <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Nhập lại', ['class' => 'btn btn-default']) ?>
        </div>
        <?php // $form->field($model, 'id_kiemtra')  ?>
        <?php // echo $form->field($model, 'id_mucdobaotri') ?>

        <?php // echo $form->field($model, 'noidung') ?>

        <?php // echo $form->field($model, 'giatri') ?>

        <?php // echo $form->field($model, 'id_donvithuchien') ?>

        <?php // echo $form->field($model, 'file') ?>

        <?php // echo $form->field($model, 'nguoitao') ?>

        <?php // echo $form->field($model, 'ngaytao') ?>

        <?php // echo $form->field($model, 'nguoisua') ?>

        <?php // echo $form->field($model, 'ngaysua') ?>

        <?php ActiveForm::end(); ?>
    </div>   
</div>
