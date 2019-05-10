<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Donvi;
use frontend\models\MucDoKiemTra;
use yii\jui\DatePicker;
use frontend\models\Cau;
use kartik\select2\Select2;
use froala\froalaeditor\FroalaEditorWidget;

$id_bridge = (int)Yii::$app->getRequest()->getQueryParam('id_bridge');
if($id_bridge == 0){
    $id_bridge = null;
}
$id_kt = (int)Yii::$app->getRequest()->getQueryParam('id');

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKiemtra */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
    .fr-toolbar{
        z-index: 1 !important;
    }
    .fr-wrapper{
        z-index: 0 !important;
    }
    .fr-quick-insert { display: none; }
</style>

<div class="cau-kiemtra-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
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
        <div class="col-lg-4">
            <?=
            $form->field($model, 'id_donvikiemtra')->dropDownList(
                    ArrayHelper::map(Donvi::find()->all(), 'id_donvi', 'ten'), ['prompt' => " -- Chọn đơn vị --"]
            )
            ?>
        </div>
        <div class="col-lg-4">
            <?=
            $form->field($model, 'ngaykiemtra')->widget(DatePicker::className(), [
                'language' => 'vi',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control']
            ]);
            ?>
        </div>
        <div class="col-lg-4">
            <?=
            $form->field($model, 'id_mucdokiemtra')->dropDownList(
                    ArrayHelper::map(MucDoKiemTra::find()->all(), 'id_mucdo', 'ten'), ['prompt' => " -- Chọn mức độ --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'cansuachua')->checkbox() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'file')->fileInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'hinhanh')->fileInput() ?>
        </div>
        <div class="col-lg-6 required">
            <label class="control-label">Nội dung</label>
            <?=
            FroalaEditorWidget::widget([
                'model' => $model,
                'attribute' => 'noidung',
                'options' => [
                    // html attributes
                    'id' => 'noidung',
                    'aria-required' => 'true',
                ],
                'clientOptions' => [
                    'toolbarInline' => false,
                    'height' => 200,
                    'theme' => 'royal', //optional: dark, red, gray, royal
                    'language' => 'en_us', // optional: ar, bs, cs, da, de, en_ca, en_gb, en_us ...
                    //'toolbarButtons' => ['fullscreen','emoticons',  'bold', 'italic', 'underline', '|', 'paragraphFormat', 'insertImage', 'insertImage', 'insertVideo', 'insertFile','-' ],
                    'toolbarButtons' => ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'inlineClass', 'clearFormatting', '|', 'fontAwesome', 'specialCharacters', 'paragraphFormat', 'lineHeight', 'paragraphStyle', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '|', 'insertLink', 'insertTable', 'insertHR', 'selectAll', 'getPDF', 'print', 'help', 'html', 'fullscreen', '|', 'undo', 'redo'],
                    //'imageUploadParam' => 'file',
                    //'imageUploadURL' => \yii\helpers\Url::to(['web/uploads/froala/'])
                ],
                //'clientPlugins'=> ['fullscreen', 'paragraph_format', 'image']
            ]);
            ?>
        </div>
        <div class="col-lg-6 required">
            <label class="control-label">Kết luận</label>
            <?=
            FroalaEditorWidget::widget([
                'model' => $model,
                'attribute' => 'ketluan',
                'options' => [
                    // html attributes
                    'id' => 'ketluan',
                    'aria-required' => 'true',
                ],
                'clientOptions' => [
                    'toolbarInline' => false,
                    'height' => 200,
                    'theme' => 'royal', //optional: dark, red, gray, royal
                    'language' => 'en_us', // optional: ar, bs, cs, da, de, en_ca, en_gb, en_us ...
                    //'toolbarButtons' => ['fullscreen','emoticons',  'bold', 'italic', 'underline', '|', 'paragraphFormat', 'insertImage', 'insertImage', 'insertVideo', 'insertFile','-' ],
                    'toolbarButtons' => ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'inlineClass', 'clearFormatting', '|', 'fontAwesome', 'specialCharacters', 'paragraphFormat', 'lineHeight', 'paragraphStyle', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '|', 'insertLink', 'insertTable', 'insertHR', 'selectAll', 'getPDF', 'print', 'help', 'html', 'fullscreen', '|', 'undo', 'redo'],
                    //'imageUploadParam' => 'file',
                    //'imageUploadURL' => \yii\helpers\Url::to(['web/uploads/froala/'])
                ],
                //'clientPlugins'=> ['fullscreen', 'paragraph_format', 'image']
            ]);
            ?>
        </div>
    </div>
    <?php
    if($id_kt == 0 || $model->cansuachua != 2)
    {
    ?>
    <div class="row" style="margin-top: 20px; text-align: center">
        <div class="form-group">
            <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php
    }
    ?>
    <?php ActiveForm::end(); ?>
</div>
