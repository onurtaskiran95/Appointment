<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel kouosl\Appointment\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Randevu Listesi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Randevu Ekle', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'appointment_date',
            'appointment_name',
            'appointment_email:email',
            'appointment_text:ntext',
            [
                'attribute'=>'appointment_status',
                'value'=>  'AppointmentStatus',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
