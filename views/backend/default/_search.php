<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model kouosl\Appointment\models\AppointmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'appointment_id') ?>

    <?= $form->field($model, 'appointment_date') ?>

    <?= $form->field($model, 'appointment_name') ?>

    <?= $form->field($model, 'appointment_email') ?>

    <?= $form->field($model, 'appointment_text') ?>

    <?php // echo $form->field($model, 'appointment_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Ara', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Sıfırla', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
