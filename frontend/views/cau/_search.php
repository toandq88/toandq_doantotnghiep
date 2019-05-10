<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cau-search">

    <?php $form = ActiveForm::begin([
        'action' => ['export'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cau') ?>

    <?= $form->field($model, 'id_tuyenduong') ?>

    <?= $form->field($model, 'sohieu') ?>

    <?= $form->field($model, 'ten') ?>

    <?= $form->field($model, 'doituongvuot') ?>

    <?php // echo $form->field($model, 'tensongsuoi') ?>

    <?php // echo $form->field($model, 'gocgiao') ?>

    <?php // echo $form->field($model, 'kmchinh') ?>

    <?php // echo $form->field($model, 'kmle') ?>

    <?php // echo $form->field($model, 'vido') ?>

    <?php // echo $form->field($model, 'kinhdo') ?>

    <?php // echo $form->field($model, 'id_tinh') ?>

    <?php // echo $form->field($model, 'id_huyen') ?>

    <?php // echo $form->field($model, 'id_xa') ?>

    <?php // echo $form->field($model, 'loailanduong') ?>

    <?php // echo $form->field($model, 'dangcau') ?>

    <?php // echo $form->field($model, 'chieudai') ?>

    <?php // echo $form->field($model, 'sonhip') ?>

    <?php // echo $form->field($model, 'sodonhip') ?>

    <?php // echo $form->field($model, 'berongcau') ?>

    <?php // echo $form->field($model, 'berongphanxechay') ?>

    <?php // echo $form->field($model, 'berongphanbohanh') ?>

    <?php // echo $form->field($model, 'taitrongthietke') ?>

    <?php // echo $form->field($model, 'theoquytrinh') ?>

    <?php // echo $form->field($model, 'namxaydung') ?>

    <?php // echo $form->field($model, 'taitrongkhaithac') ?>

    <?php // echo $form->field($model, 'namduavaokhaithac') ?>

    <?php // echo $form->field($model, 'chaychungvoi_duongsat') ?>

    <?php // echo $form->field($model, 'chaychungvoi_congtrinhthuyloi') ?>

    <?php // echo $form->field($model, 'donvixaydungcau') ?>

    <?php // echo $form->field($model, 'tinhkhong_vemuakho') ?>

    <?php // echo $form->field($model, 'tinhkhong_vemualu') ?>

    <?php // echo $form->field($model, 'tinhkhong_codinh') ?>

    <?php // echo $form->field($model, 'tinhkhong_thongthuyen') ?>

    <?php // echo $form->field($model, 'tinhkhong_trencau') ?>

    <?php // echo $form->field($model, 'bienbao_tencau') ?>

    <?php // echo $form->field($model, 'bienbao_taitrong') ?>

    <?php // echo $form->field($model, 'bienbao_tocdo') ?>

    <?php // echo $form->field($model, 'bienbao_culyxe') ?>

    <?php // echo $form->field($model, 'bienbao_chieucao') ?>

    <?php // echo $form->field($model, 'bienbao_chieurong') ?>

    <?php // echo $form->field($model, 'bienbao_khac') ?>

    <?php // echo $form->field($model, 'dongchay_thuytrieu') ?>

    <?php // echo $form->field($model, 'dongchay_nhiemman') ?>

    <?php // echo $form->field($model, 'dongchay_lulut') ?>

    <?php // echo $form->field($model, 'dongchay_thongthuyen') ?>

    <?php // echo $form->field($model, 'dongchay_capsong') ?>

    <?php // echo $form->field($model, 'dongchay_thoikylu') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'ghichu') ?>

    <?php // echo $form->field($model, 'nguoitao') ?>

    <?php // echo $form->field($model, 'ngaytao') ?>

    <?php // echo $form->field($model, 'nguoisua') ?>

    <?php // echo $form->field($model, 'ngaysua') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
