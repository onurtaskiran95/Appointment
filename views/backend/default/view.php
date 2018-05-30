<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model kouosl\Appointment\models\Appointment */

$this->title = $model->appointment_name;
$this->params['breadcrumbs'][] = ['label' => 'Randevu Listesi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Güncelle', ['update', 'id' => $model->appointment_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Sil', ['delete', 'id' => $model->appointment_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'appointment_id',
            'appointment_date',
            'appointment_name',
            'appointment_email:email',
            'appointment_text:ntext',
            [
                'attribute'=>'appointment_status',
                'value'=>  $model->AppointmentStatus,
            ],
        ],
    ]) ?>

</div>
