<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\captcha\Captcha;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel kouosl\Appointment\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Randevu Al';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="appointment-form">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'appointment_date')->widget(
            DatePicker::className(), [
                // inline too, not bad
                 'inline' => true,
                 // modify template for custom rendering
                'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
        ]);?>
        <?= $form->field($model, 'appointment_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'appointment_email')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'appointment_text')->textarea(['rows' => 6]) ?>
        <div class="form-group">
            <?= Html::submitButton('Gönder', ['class' => 'btn btn-success']) ?>
            <br><br>
            <p>Randevunuz onaylandığında E-Posta adresinize bilgi gelecektir.</p>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
