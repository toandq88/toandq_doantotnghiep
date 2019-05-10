<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CauKhecogian;

/**
 * CauKhecogianSearch represents the model behind the search form of `frontend\models\CauKhecogian`.
 */
class CauKhecogianSearch extends CauKhecogian
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_khecogian', 'thutu' ], 'integer'],    //'vatlieuchinh'
            [['vitri', 'id_cau', 'ghichu', 'loaikhe'], 'safe'],
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
        $query = CauKhecogian::find();

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
            'id_khecogian' => $this->id_khecogian,
            //'id_cau' => $this->id_cau,
            'thutu' => $this->thutu,
            //'loaikhe' => $this->loaikhe,
            'vatlieuchinh' => $this->vatlieuchinh,
        ]);
        
        $query->joinWith('cau');
        $query->joinWith('loaikhecogian');

        $query->andFilterWhere(['like', 'vitri', $this->vitri])
                ->andFilterWhere(['like', 'tb_cau.ten', $this->id_cau])
                ->andFilterWhere(['like', 'tb_cau_thongtinchung.ten', $this->loaikhe])
                ->andFilterWhere(['like', 'ghichu', $this->ghichu]);

        return $dataProvider;
    }
}
