<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CauGoicau;

/**
 * CauGoicauSearch represents the model behind the search form of `frontend\models\CauGoicau`.
 */
class CauGoicauSearch extends CauGoicau {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_goicau', 'thutu'], 'integer'],        // 'vatlieu'
            [['trennhip', 'id_cau', 'trenmotru', 'ghichu', 'danglienket'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = CauGoicau::find();

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
            'id_goicau' => $this->id_goicau,
            //'id_cau' => $this->id_cau,
            'thutu' => $this->thutu,
            //'danglienket' => $this->danglienket,
            'vatlieu' => $this->vatlieu,
        ]);

        $query->joinWith('cau');
        $query->joinWith('loaidanglienket');

        $query->andFilterWhere(['like', 'trennhip', $this->trennhip])
                ->andFilterWhere(['like', 'tb_cau.ten', $this->id_cau])
                ->andFilterWhere(['like', 'tb_cau_thongtinchung.ten', $this->danglienket])
                ->andFilterWhere(['like', 'trenmotru', $this->trenmotru])
                ->andFilterWhere(['like', 'ghichu', $this->ghichu]);

        return $dataProvider;
    }

}
