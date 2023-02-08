<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gelombang;

/**
 * GelombangSearch represents the model behind the search form of `app\models\Gelombang`.
 */
class GelombangSearch extends Gelombang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['kode_gelombang', 'gelombang', 'tahun', 'awal_daftar', 'akhir_daftar', 'pelaksanaan'], 'safe'],
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
        $query = Gelombang::find();

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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'kode_gelombang', $this->kode_gelombang])
            ->andFilterWhere(['like', 'gelombang', $this->gelombang])
            ->andFilterWhere(['like', 'tahun', $this->tahun])
            ->andFilterWhere(['like', 'awal_daftar', $this->awal_daftar])
            ->andFilterWhere(['like', 'akhir_daftar', $this->akhir_daftar])
            ->andFilterWhere(['like', 'pelaksanaan', $this->pelaksanaan]);

        return $dataProvider;
    }
}
