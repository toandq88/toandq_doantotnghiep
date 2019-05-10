<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Donvi;

$this->title = 'Thêm mới người dùng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h4><?= Html::encode($this->title) ?></h4>
    <div class="row">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="col-lg-6">
            <?=
            $form->field($model, 'id_donvi')->dropDownList(
                    ArrayHelper::map(Donvi::find()->all(), 'id_donvi', 'ten'), ['prompt' => "Chọn đơn vị"]
            )
            ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'name') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'email') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'phone') ?>
        </div>
    </div>
    <div class="row" style="margin-top: 20px; text-align: center">
        <div class="form-group">
            <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
