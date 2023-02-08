<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JadwalYudisium;

/**
 * JadwalYudisiumSearch represents the model behind the search form of `app\models\JadwalYudisium`.
 */
class JadwalYudisiumSearch extends JadwalYudisium
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_users', 'id_fakultas', 'status'], 'integer'],
            [['awal_daftar', 'akhir_daftar', 'pelaksanaan', 'created_at'], 'safe'],
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
        $query = JadwalYudisium::find();

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
            'id' => $this->id,
            'id_users' => $this->id_users,
            'id_fakultas' => $this->id_fakultas,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'awal_daftar', $this->awal_daftar])
            ->andFilterWhere(['like', 'akhir_daftar', $this->akhir_daftar])
            ->andFilterWhere(['like', 'pelaksanaan', $this->pelaksanaan]);

        return $dataProvider;
    }
}
