<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Tuyenduong;
use frontend\models\CauThongtinchung;
use frontend\models\VnTinh;
use frontend\models\VnHuyen;
use frontend\models\VnXa;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cau */
/* @var $form yii\widgets\ActiveForm */ 
$link = 'http://'.Yii::$app->getRequest()->serverName.':81'.Yii::$app->homeUrl;
//echo 'Link: '.$link;
?>
<script src="<?= Yii::getAlias('@web') . '/toandq/js/jquery-1.11.0.js' ?>"></script>
<script>
    $(document).ready(function () {
        $("#title_tinhkhong").click(function () {
            $(".cont_tinhkhong").toggle(1000);
        });

        $("#title_dongchay").click(function () {
            $(".cont_dongchay").toggle(1000);
        });
    });
</script>

<div class="cau-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div style="margin-left:13px; background: #aae2ff; color: #002a80; width: 100%; border-radius: 4px; margin-bottom: 20px; padding: 8px 15px;">
            Thông tin cơ bản
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'id_tuyenduong')->dropDownList(
                    ArrayHelper::map(Tuyenduong::find()->all(), 'id_tuyenduong', 'mahieu'), ['prompt' => " -- Chọn theo mã hiệu --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'sohieu')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'doituongvuot')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'CAU_VUOTQUA'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'tensongsuoi')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'gocgiao')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'kmchinh')->textInput(['class' => 'form-control', 'placeholder' => "Từ km chính"]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'kmle')->textInput(['class' => 'form-control', 'placeholder' => "+ km lẻ"]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'vido')->textInput(['maxlength' => true, 'class' => ' form-control', 'placeholder' => "21.111111"]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'kinhdo')->textInput(['maxlength' => true, 'class' => ' form-control', 'placeholder' => "105.111111"]) ?>
        </div>
        <div class="col-lg-2">
            <?=
            $form->field($model, 'id_tinh')->dropDownList(
                ArrayHelper::map(VnTinh::find()->all(), 'id_tinh', 'ten'), 
                [
                    'prompt' => " -- Chọn --",
                    'onchange' => '$.post("'.$link.'vn-huyen/lists?id_tinh=' . '"+$(this).val(), function(data){
                            $("select#cau-id_huyen").html(data);
                            $("select#cau-id_huyen").attr("disabled",false);
                            });'
                ]);
            ?><!-- http://localhost:81/toandq_advanced/frontend/web/vn-huyen/lists -->
        </div>
        <div class="col-lg-2">
            <?=
            $form->field($model, 'id_huyen')->dropDownList(
                ArrayHelper::map(VnHuyen::find()->all(), 'id_huyen', 'ten'),
                [
                'prompt' => " -- Chọn --",
                'onchange' => '$.post("'.$link.'vn-xa/lists?id_huyen=' . '"+$(this).val(), function(data){
                            $("select#cau-id_xa").html(data);
                            $("select#cau-id_xa").attr("disabled",false);
                            });',
                'disabled' => 'true',
            ]);
            ?>
        </div>
        <div class="col-lg-2">
            <?=
            $form->field($model, 'id_xa')->dropDownList(
                ArrayHelper::map(VnXa::find()->all(), 'id_xa', 'ten'),
                [
                'prompt' => " -- Chọn --",
                'disabled' => 'true',
            ]);
            ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'loailanduong')->dropdownList(
                    [
                '1' => ' - Phải tuyến',
                '2' => ' - Trái tuyến',
                '3' => ' - Cả phải tuyến và trái tuyến',
                    ], ['prompt' => '--- Chọn ---']
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'dangcau')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'CAU_DANG'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'chieudai')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'sonhip')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'sodonhip')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'berongcau')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'berongphanxechay')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'berongphanbohanh')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'taitrongthietke')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'CAU_TAITRONGTHIETKE'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'theoquytrinh')->dropDownList(
                    ArrayHelper::map(CauThongtinchung::find()->where(['loai' => 'CAU_QUYTRINHTHIETKE'])->all(), 'id_loai', 'ten'), ['prompt' => " -- Chọn --"]
            )
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'namxaydung')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'taitrongkhaithac')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'namduavaokhaithac')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'donvixaydungcau')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'chaychungvoi_duongsat')->checkbox() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'chaychungvoi_congtrinhthuyloi')->checkbox() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'file')->fileInput() ?>
        </div>
        <div id="title_tinhkhong" style="margin-left: 13px; background: #aae2ff; color: #002a80; width: 100%; border-radius: 4px; margin-bottom: 20px; padding: 8px 15px; clear: both; cursor: pointer">
            - Tĩnh không và biển báo
        </div>
        <div class="cont_tinhkhong">
            <div class="col-lg-3">
                <?= $form->field($model, 'tinhkhong_vemuakho')->textInput() ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'tinhkhong_vemualu')->textInput() ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'tinhkhong_codinh')->textInput() ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'tinhkhong_thongthuyen')->textInput() ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'tinhkhong_trencau')->textInput() ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'bienbao_tencau')->checkbox() ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'bienbao_taitrong')->textInput() ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'bienbao_tocdo')->textInput() ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'bienbao_culyxe')->textInput() ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'bienbao_chieucao')->textInput() ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'bienbao_chieurong')->textInput() ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'bienbao_khac')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div id="title_dongchay" style="margin-left: 13px; background: #aae2ff; color: #002a80; width: 100%; border-radius: 4px; margin-bottom: 20px; padding: 8px 15px; clear: both; cursor: pointer">
            - Một số đặc điểm dòng chảy
        </div>
        <div class="cont_dongchay">
            <div class="col-lg-3">
                <?= $form->field($model, 'dongchay_thuytrieu')->textInput(['class' => ' form-control', 'placeholder' => "Biên độ thủy triều"]) ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'dongchay_nhiemman')->checkbox() ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'dongchay_lulut')->checkbox() ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'dongchay_thongthuyen')->checkbox() ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'dongchay_capsong')->textInput(['class' => ' form-control', 'placeholder' => "Cấp sông"]) ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'dongchay_thoikylu')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 20px; text-align: center">
        <div class="form-group">
            <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
