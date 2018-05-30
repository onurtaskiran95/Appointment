<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kouosl\Appointment\models\Appointment */

$this->title = 'Randevu Güncelle: ' . $model->appointment_name;
$this->params['breadcrumbs'][] = ['label' => 'Randevu Listesi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->appointment_name, 'url' => ['view', 'id' => $model->appointment_id]];
$this->params['breadcrumbs'][] = 'Güncelle';
?>
<div class="appointment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
