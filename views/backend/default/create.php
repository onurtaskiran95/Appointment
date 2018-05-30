<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model kouosl\Appointment\models\Appointment */

$this->title = 'Randevu Ekle';
$this->params['breadcrumbs'][] = ['label' => 'Randevu Listesi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
