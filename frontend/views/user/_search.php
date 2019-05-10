<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">
    <div class="row">
        <?php
        $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
        ]);
        ?>

        <?php //$form->field($model, 'id') ?>
        <div class="col-lg-6">
            <?= $form->field($model, 'username') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'name') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'email') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'phone') ?>
        </div>
        <?php // $form->field($model, 'status') ?>

        <?php // echo $form->field($model, 'created_at') ?>

        <?php // echo $form->field($model, 'updated_at') ?>

        <?php // echo $form->field($model, 'id_donvi')  ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
