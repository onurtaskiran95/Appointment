<?php

namespace kouosl\Appointment\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use kouosl\Appointment\models\Appointment;

/**
 * AppointmentSearch represents the model behind the search form of `kouosl\Appointment\models\Appointment`.
 */
class AppointmentSearch extends Appointment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appointment_id', 'appointment_status'], 'integer'],
            [['appointment_date', 'appointment_name', 'appointment_email', 'appointment_text'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Appointment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'appointment_id' => $this->appointment_id,
            'appointment_status' => $this->appointment_status,
        ]);

        $query->andFilterWhere(['like', 'appointment_date', $this->appointment_date])
            ->andFilterWhere(['like', 'appointment_name', $this->appointment_name])
            ->andFilterWhere(['like', 'appointment_email', $this->appointment_email])
            ->andFilterWhere(['like', 'appointment_text', $this->appointment_text]);

        return $dataProvider;
    }
}
