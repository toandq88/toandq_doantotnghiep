<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CauKiemtraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cau-kiemtra-search">
    <div class="row" style="margin-bottom: 20px;">
        <?php
        $form = ActiveForm::begin([
                    'action' => ['export'],
                    'method' => 'get',
        ]);
        ?>

        <?php // $form->field($model, 'id_kiemtra') ?>
        <div class="col-lg-3">
            <?= $form->field($model, 'id_cau')->textInput(['placeholder' => "Tên cầu"]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'created_at_range')->textInput(['placeholder' => "mm/dd/YYYY - mm/dd/YYYY"])->label('Chọn khoảng thời gian',['class'=>'label-class']) ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'cansuachua')->dropdownList(
                    [
                '0' => ' - Không',
                '2' => ' - Có',
                '3' => ' - Có / Đã sửa chữa',
                    ], ['prompt' => '--- Tất cả ---']
            )
            ?>
        </div>
        <div class="col-lg-3" style="padding-top: 24px;">
            <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Nhập lại', ['class' => 'btn btn-default']) ?>
        </div>
        <?php // $form->field($model, 'cansuachua')->checkbox() ?>
        
        <?php // $form->field($model, 'id_donvikiemtra') ?>
        
        <?php // $form->field($model, 'id_mucdokiemtra') ?>
        
        <?php // echo $form->field($model, 'noidung') ?>

        <?php // echo $form->field($model, 'ketluan') ?>

        <?php // echo $form->field($model, 'nguoitao') ?>

        <?php // echo $form->field($model, 'ngaytao') ?>

        <?php // echo $form->field($model, 'nguoisua') ?>

        <?php // echo $form->field($model, 'ngaysua')  ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
