<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKetcauduoiMoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cau-ketcauduoi-mo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ketcauduoimo') ?>

    <?= $form->field($model, 'id_cau') ?>

    <?= $form->field($model, 'kyhieu') ?>

    <?= $form->field($model, 'phia') ?>

    <?= $form->field($model, 'thanmo_dang') ?>

    <?php // echo $form->field($model, 'thanmo_vatlieu') ?>

    <?php // echo $form->field($model, 'thanmo_chieucao') ?>

    <?php // echo $form->field($model, 'thanmo_vatlieuxamu') ?>

    <?php // echo $form->field($model, 'mongmo_dang') ?>

    <?php // echo $form->field($model, 'mongmo_vatlieu') ?>

    <?php // echo $form->field($model, 'tunon') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
