<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Cau;
use frontend\models\CauThongtinchung;
use kartik\select2\Select2;

$id_bridge = (int)Yii::$app->getRequest()->getQueryParam('id_bridge');
if($id_bridge == 0){
    $id_bridge = null;
}

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKetcauduoiTru */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cau-ketcauduoi-tru-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-lg-12">
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
            <?= $form->field($model, 'kyhieu')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'thantru_dang')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'KETCAUDUOI_THANTRU'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'thantru_vatlieu')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'KETCAUDUOI_VATLIEU'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'thantru_chieucao')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'thantru_vatlieuxamu')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'KETCAUDUOI_VATLIEU'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'mongtru_dang')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'DANG_MONGMO'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'mongtru_vatlieu')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'KETCAUDUOI_VATLIEU'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'ketcauphongho')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'KETCAUDUOI_PHONGHOTRU'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
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
