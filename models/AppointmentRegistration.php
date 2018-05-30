<?php
namespace kouosl\Appointment\models;

use Yii;
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
class AppointmentRegistration extends kouosl\Appointment\models\Appointment
{
    public function registration()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->access_token = \Yii::$app->security->generateRandomString();
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}
