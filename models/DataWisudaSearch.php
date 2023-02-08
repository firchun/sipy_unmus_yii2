<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DataWisuda;

/**
 * DataWisudaSearch represents the model behind the search form of `app\models\DataWisuda`.
 */
class DataWisudaSearch extends DataWisuda
{
    public $gelombangfrom;
    public $gelombangto;
    public $tahunfrom;
    public $tahunto;
    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['gelombang.tahun']);
    }
    public function rules()
    {
        return [
            [['id', 'id_users', 'id_data_yudisium', 'id_fakultas', 'id_jurusan', 'id_gelombang', 'gelombangfrom', 'gelombangto'], 'integer'],
            [['tanggal_yudisium', 'created_at', 'gelombang.tahun', 'tahunfrom', 'tahunto'], 'safe'],
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
        $query = DataWisuda::find();


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
        $query->joinWith(['gelombang gl']);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_users' => $this->id_users,
            'id_data_yudisium' => $this->id_data_yudisium,
            'id_gelombang' => $this->id_gelombang,
            'id_fakultas' => $this->id_fakultas,
            'id_jurusan' => $this->id_jurusan,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'tanggal_yudisium', $this->tanggal_yudisium])
            ->andFilterWhere(['>=', 'id_gelombang', $this->gelombangfrom])
            ->andFilterWhere(['<=', 'id_gelombang', $this->gelombangto])
            ->andFilterWhere(['>=', 'gl.tahun', $this->tahunfrom])
            ->andFilterWhere(['<=', 'gl.tahun', $this->tahunto]);

        return $dataProvider;
    }
}
