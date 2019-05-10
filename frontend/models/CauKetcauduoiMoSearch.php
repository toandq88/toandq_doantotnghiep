<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CauKetcauduoiMo;

/**
 * CauKetcauduoiMoSearch represents the model behind the search form of `frontend\models\CauKetcauduoiMo`.
 */
class CauKetcauduoiMoSearch extends CauKetcauduoiMo {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_ketcauduoimo'], 'integer'], //'thanmo_dang', 'thanmo_vatlieu', 'mongmo_dang', 'mongmo_vatlieu',  'tunon'
            [['kyhieu', 'phia', 'id_cau', 'thanmo_vatlieuxamu', 'thanmo_chieucao'], 'safe'],
            //[['thanmo_chieucao'], 'number'],
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
        $query = CauKetcauduoiMo::find();

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
            'id_ketcauduoimo' => $this->id_ketcauduoimo,
            //'id_cau' => $this->id_cau,
            'thanmo_dang' => $this->thanmo_dang,
            'thanmo_vatlieu' => $this->thanmo_vatlieu,
            //'thanmo_chieucao' => $this->thanmo_chieucao,
            'mongmo_dang' => $this->mongmo_dang,
            'mongmo_vatlieu' => $this->mongmo_vatlieu,
            'tunon' => $this->tunon,
        ]);

        $query->joinWith('cau');
        $query->joinWith('vatlieuxamu');

        $query->andFilterWhere(['like', 'kyhieu', $this->kyhieu])
                ->andFilterWhere(['like', 'phia', $this->phia])
                ->andFilterWhere(['like', 'thanmo_chieucao', $this->thanmo_chieucao])
                ->andFilterWhere(['like', 'tb_cau.ten', $this->id_cau])
                ->andFilterWhere(['like', 'tb_cau_thongtinchung.ten', $this->thanmo_vatlieuxamu]);

        return $dataProvider;
    }

}
