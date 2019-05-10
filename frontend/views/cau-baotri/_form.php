<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Donvi;
use frontend\models\MucDoBaoTri;
use yii\jui\DatePicker;
use frontend\models\Cau;
use frontend\models\CauKiemtra;
use kartik\select2\Select2;
use froala\froalaeditor\FroalaEditorWidget;

$id_bridge = (int) Yii::$app->getRequest()->getQueryParam('id_bridge');
if ($id_bridge == 0) {
    $id_bridge = null;
}

$id_check = (int) Yii::$app->getRequest()->getQueryParam('id_check');     //Nếu có thông tin đợt kiểm tra

$link = 'http://' . Yii::$app->getRequest()->serverName . ':81' . Yii::$app->homeUrl;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauBaotri */
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

<div class="cau-baotri-form">
    <div class="row">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="col-lg-12">
            <?php
            echo $form->field($model, 'id_cau')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Cau::find()->all(), 'id_cau', 'ten'),
                'language' => 'vi',
                'options' => [
                    'placeholder' => 'Chọn cầu...',
                    'value' => $id_bridge,
                    'onchange' => '$.post("' . $link . 'cau-kiemtra/lists?id_cau=' . '"+$(this).val(), function(data){
                            $("select#caubaotri-id_kiemtra").html(data);
                            $("select#caubaotri-id_kiemtra").attr("disabled",false);
                            });'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ]
            ]);
            ?>
        </div>
        <div class="col-lg-3">
            <?php
            if ($id_check != 0) {
                echo $form->field($model, 'id_kiemtra')->dropDownList(ArrayHelper::map(CauKiemtra::find()->where(['id_kiemtra' => $id_check])->all(), 'id_kiemtra', 'ngaykiemtra'));
            }
            else{
                echo $form->field($model, 'id_kiemtra')->dropDownList(ArrayHelper::map(CauKiemtra::find()->where([])->all(), 'id_kiemtra', 'ngaykiemtra'), ['prompt' => " -- Chọn --", 'disabled' => true]);   
            }
            ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'ngaybatdau')->widget(DatePicker::className(), [
                'language' => 'vi',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control']
            ]);
            ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'ngayketthuc')->widget(DatePicker::className(), [
                'language' => 'vi',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control']
            ]);
            ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'id_mucdobaotri')->dropDownList(
                    ArrayHelper::map(MucDoBaoTri::find()->all(), 'id_mucdo', 'ten_mucdo'), ['prompt' => " -- Chọn mức độ --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'giatri')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'id_donvithuchien')->dropDownList(
                    ArrayHelper::map(Donvi::find()->all(), 'id_donvi', 'ten'), ['prompt' => " -- Chọn đơn vị --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'file')->fileInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'hinhanh')->fileInput() ?>
        </div>
        <div class="col-lg-12 required">
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
        <div class="col-lg-12" style="margin-top: 20px">
            <label class="control-label">Ghi chú</label>
            <?=
            FroalaEditorWidget::widget([
                'model' => $model,
                'attribute' => 'ghichu',
                'options' => [
                    // html attributes
                    'id' => 'ghichu',
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
    <div class="row" style="margin-top: 20px; text-align: center">
        <div class="form-group">
            <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
