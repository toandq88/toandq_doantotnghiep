<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Đăng nhập hệ thống';
//$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['id' => 'login-form'], ['class' => 'login-container']); ?>

<?= $form->field($model, 'username')->textInput(['autofocus' => true])->input('username',['placeholder' => "Tên đăng nhập"])->label(FALSE) ?>
<?= $form->field($model, 'password')->passwordInput()->input('password',['placeholder' => "Mật khẩu"])->label(FALSE) ?>
<?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-primary', 'name' => 'login-button'])  ?>

<?php //$form->field($model, 'rememberMe')->checkbox()  ?>


<?php ActiveForm::end(); ?>
