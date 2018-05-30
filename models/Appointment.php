<?php

namespace kouosl\Appointment\models;

use kouosl\site\Module;
use yii\base\Model;
use kouosl\user\models\User;

/**
 * This is the model class for table "tblAppointment".
 *
 * @property int $appointment_id
 * @property string $appointment_date
 * @property string $appointment_name
 * @property string $appointment_email
 * @property string $appointment_text
 * @property int $appointment_status
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblAppointment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appointment_date', 'appointment_name', 'appointment_email', 'appointment_text'], 'required'],
            [['appointment_text'], 'string'],
            [['appointment_status'], 'integer'],
            [['appointment_date', 'appointment_name', 'appointment_email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'appointment_id' => 'Randevu ID',
            'appointment_date' => 'Randevu Tarihi',
            'appointment_name' => 'Ad Soyad',
            'appointment_email' => 'E-Posta Adresi',
            'appointment_text' => 'Açıklama',
            'appointment_status' => 'Randevu Durumu',
        ];
    }
    public function getAppointmentStatus()
    {
        return $this->appointment_status ? 'Onaylı' : 'Onaylı Değil';
    }
}
