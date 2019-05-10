<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Cau;
use kartik\select2\Select2;

$id_bridge = (int)Yii::$app->getRequest()->getQueryParam('id_bridge');
if($id_bridge == 0){
    $id_bridge = null;
}

/* @var $this yii\web\View */
/* @var $model frontend\models\CauHinhanh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cau-hinhanh-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php
            echo $form->field($model, 'id_cau')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Cau::find()->all(), 'id_cau', 'ten'),
                'language' => 'en',
                'options' => ['placeholder' => 'Chọn cầu...', 'value' => $id_bridge],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-lg-12">
            <?=
            $form->field($model, 'loai')->dropdownList(
                    [
                'CAU' => ' - Hình ảnh cầu',
                'CAU_DOC' => ' - Hình ảnh cắt dọc cầu',
                'CAU_NGANG' => ' - Hình ảnh cắt ngang cầu',
                    ], ['prompt' => '--- Chọn loại ---']
            )
            ?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($model, 'file')->fileInput() ?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($model, 'noidung')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row" style="margin-top: 20px; text-align: center">
        <div class="form-group">
            <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
