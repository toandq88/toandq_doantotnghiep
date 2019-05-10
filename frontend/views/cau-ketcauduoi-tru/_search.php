<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKetcauduoiTruSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cau-ketcauduoi-tru-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ketcauduoitru') ?>

    <?= $form->field($model, 'id_cau') ?>

    <?= $form->field($model, 'kyhieu') ?>

    <?= $form->field($model, 'thantru_dang') ?>

    <?= $form->field($model, 'thantru_vatlieu') ?>

    <?php // echo $form->field($model, 'thantru_chieucao') ?>

    <?php // echo $form->field($model, 'thantru_vatlieuxamu') ?>

    <?php // echo $form->field($model, 'mongtru_dang') ?>

    <?php // echo $form->field($model, 'mongtru_vatlieu') ?>

    <?php // echo $form->field($model, 'ketcauphongho') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
