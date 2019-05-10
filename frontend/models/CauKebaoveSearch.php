<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CauKebaove;

/**
 * CauKebaoveSearch represents the model behind the search form of `frontend\models\CauKebaove`.
 */
class CauKebaoveSearch extends CauKebaove {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_kebaove', 'thutu'], 'integer'], //, 'vatlieuchinh', 'loaimongke'
            [['mota', 'id_cau', 'loaike'], 'safe'],
            [['chieudai', 'chieucao'], 'number'],
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
        $query = CauKebaove::find();

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
            'id_kebaove' => $this->id_kebaove,
            //'id_cau' => $this->id_cau,
            'thutu' => $this->thutu,
            'tb_cau_kebaove.chieudai' => $this->chieudai,
            'chieucao' => $this->chieucao,
            //'loaike' => $this->loaike,
            'vatlieuchinh' => $this->vatlieuchinh,
            'loaimongke' => $this->loaimongke,
        ]);

        $query->joinWith('cau');
        $query->joinWith('loaikebaove');

        $query->andFilterWhere(['like', 'mota', $this->mota])
                ->andFilterWhere(['like', 'tb_cau.ten', $this->id_cau])
                ->andFilterWhere(['like', 'tb_cau_thongtinchung.ten', $this->loaike]);

        return $dataProvider;
    }

}
