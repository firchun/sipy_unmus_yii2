<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DataYudisium;

/**
 * SearchDataYudisium represents the model behind the search form of `app\models\DataYudisium`.
 */
class SearchDataYudisium extends DataYudisium
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_users', 'id_jurusan'], 'integer'],
            [['krs', 'khs', 'transkrip', 'judul_skripsi', 'cover_skripsi', 'persetujuan_skripsi', 'pengesahan_skripsi', 'ijazah_terakhir', 'sk_bimbingan', 'ktp', 'persetujuan', 'tanggal_yudisium', 'dosen_pendamping', 'dosen_penguji'], 'safe'],
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
        $query = DataYudisium::find();

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
        ]);

        $query->andFilterWhere(['like', 'krs', $this->krs])
            ->andFilterWhere(['like', 'khs', $this->khs])
            ->andFilterWhere(['like', 'transkrip', $this->transkrip])
            ->andFilterWhere(['like', 'judul_skripsi', $this->judul_skripsi])
            ->andFilterWhere(['like', 'cover_skripsi', $this->cover_skripsi])
            ->andFilterWhere(['like', 'persetujuan_skripsi', $this->persetujuan_skripsi])
            ->andFilterWhere(['like', 'pengesahan_skripsi', $this->pengesahan_skripsi])
            ->andFilterWhere(['like', 'ijazah_terakhir', $this->ijazah_terakhir])
            ->andFilterWhere(['like', 'sk_bimbingan', $this->sk_bimbingan])
            ->andFilterWhere(['like', 'ktp', $this->ktp])
            ->andFilterWhere(['like', 'persetujuan', $this->persetujuan])
            ->andFilterWhere(['like', 'tanggal_yudisium', $this->tanggal_yudisium]);

        return $dataProvider;
    }
}
