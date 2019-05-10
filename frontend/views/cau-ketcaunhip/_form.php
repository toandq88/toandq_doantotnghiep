<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Cau;
use frontend\models\CauThongtinchung;
use kartik\select2\Select2;

$id_bridge = (int) Yii::$app->getRequest()->getQueryParam('id_bridge');
if ($id_bridge == 0) {
    $id_bridge = null;
}

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKetcaunhip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cau-ketcaunhip-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-lg-6">
            <?php
            echo $form->field($model, 'id_cau')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Cau::find()->all(), 'id_cau', 'ten'),
                'language' => 'en',
                'options' => ['placeholder' => 'Chọn cầu...', 'value' => $id_bridge],
                //'options' => [31 => ['selected'=>true]],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'kyhieunhip')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'file')->fileInput() ?>
        </div>
        <div style="margin-left:13px; background: #aae2ff; color: #002a80; width: 100%; border-radius: 4px; margin-bottom: 20px; padding: 8px 15px; clear: both;">
            Thông tin kết cấu dọc cầu
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'doccau_sodoketcau')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'CAU_KETCAUNHIP'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'doccau_dangketcau')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'CAU_DANGKETCAU'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'doccau_chieudainhip')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'doccau_culytimgoi')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'doccau_loaivuot')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'CAU_VUOTQUA'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'doccau_loaimatduongtrencau')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'CAU_LOPPHUMATCAU'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'doccau_vatlieuduongbohanh')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'CAU_VATLIEUDUONGBOHANH'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'doccau_vatlieulancantayvin')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'CAU_VATLIEULANCANTAYVIN'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div style="margin-left:13px; background: #aae2ff; color: #002a80; width: 100%; border-radius: 4px; margin-bottom: 20px; padding: 8px 15px; clear: both;">
            Thông tin kết cấu ngang cầu
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'ngangcau_dangdamchu')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'CAU_DANGDAMCHU'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'ngangcau_sodamchu')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'ngangcau_culydam')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'ngangcau_chieucaodamchu')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'ngangcau_dangdamngang')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'CAU_LIENKETNGANG'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'ngangcau_dangdamdocphu')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'ngangcau_loaibanmatcau')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'CAU_BANMATCAU'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'ngangcau_dangketcauvom')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'CAU_KETCAUVOM'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
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