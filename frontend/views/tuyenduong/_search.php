<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TuyenduongSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tuyenduong-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tuyenduong') ?>

    <?= $form->field($model, 'mahieu') ?>

    <?= $form->field($model, 'tenduong') ?>

    <?= $form->field($model, 'capduong') ?>

    <?= $form->field($model, 'id_donviquanly') ?>

    <?php // echo $form->field($model, 'tukmchinh') ?>

    <?php // echo $form->field($model, 'tukmle') ?>

    <?php // echo $form->field($model, 'denkmchinh') ?>

    <?php // echo $form->field($model, 'denkmle') ?>

    <?php // echo $form->field($model, 'vidodau') ?>

    <?php // echo $form->field($model, 'kinhdodau') ?>

    <?php // echo $form->field($model, 'vidocuoi') ?>

    <?php // echo $form->field($model, 'kinhdocuoi') ?>

    <?php // echo $form->field($model, 'chieudaithucte') ?>

    <?php // echo $form->field($model, 'namhoanthanhxaydung') ?>

    <?php // echo $form->field($model, 'solanxecogioi') ?>

    <?php // echo $form->field($model, 'tocdothietke') ?>

    <?php // echo $form->field($model, 'nguoitao') ?>

    <?php // echo $form->field($model, 'ngaytao') ?>

    <?php // echo $form->field($model, 'nguoisua') ?>

    <?php // echo $form->field($model, 'ngaysua') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
