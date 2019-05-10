<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\VnHuyenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vn-huyen-search">
    <div class="row">
        <?php
        $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
        ]);
        ?>
        <div class="col-lg-6">
            <?= $form->field($model, 'id_huyen') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'ten') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'loai') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'vitri') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'id_tinh') ?>
        </div>
        <div class="col-lg-6">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
