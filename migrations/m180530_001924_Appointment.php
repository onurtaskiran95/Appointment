<?php

use yii\db\Migration;

/**
 * Class m180530_001924_Appointment
 */
class m180530_001924_Appointment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180530_001924_Appointment cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('tblAppointment',[
          'appointment_id' =>$this->primaryKey()->notNull(),
          'appointment_date'=>$this->string()->notNull(),
          'appointment_name'=>$this->string()->notNull(),
          'appointment_email'=>$this->string()->notNull(),
          'appointment_text'=>$this->text()->notNull(),
          'appointment_status'=>$this->boolean()->notNull(),
        ]);
        $this->insert('tblAppointment',[
          'appointment_date'=>"30.05.2018",
          'appointment_name'=>"Onur Taşkıran",
          'appointment_email'=>"onurtaskiran95@gmail.com",
          'appointment_text'=>"Randevu denemesi",
          'appointment_status'=>"0",
        ]);
    }

    public function down()
    {
        echo "m180530_001924_Appointment cannot be reverted.\n";

        return false;
    }

}
