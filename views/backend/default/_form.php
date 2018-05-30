<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model kouosl\Appointment\models\Appointment */
/* @var $form yii\widgets\ActiveForm */
?>

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

    <?= $form->field($model, 'appointment_status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Kaydet', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
