<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CauKetcauduoiTru;

/**
 * CauKetcauduoiTruSearch represents the model behind the search form of `frontend\models\CauKetcauduoiTru`.
 */
class CauKetcauduoiTruSearch extends CauKetcauduoiTru {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['id_ketcauduoitru'], 'integer'],  //'thantru_vatlieu', 'mongtru_dang', 'mongtru_vatlieu', 'ketcauphongho', 'thantru_vatlieuxamu'
                [['kyhieu', 'id_cau', 'thantru_dang'], 'safe'],
                [['thantru_chieucao'], 'number'],
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
        $query = CauKetcauduoiTru::find();

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
            'id_ketcauduoitru' => $this->id_ketcauduoitru,
            //'id_cau' => $this->id_cau,
            //'thantru_dang' => $this->thantru_dang,
            'thantru_vatlieu' => $this->thantru_vatlieu,
            //'thantru_chieucao' => $this->thantru_chieucao,
            'mongtru_dang' => $this->mongtru_dang,
            'mongtru_vatlieu' => $this->mongtru_vatlieu,
            'ketcauphongho' => $this->ketcauphongho,
        ]);
        
        $query->joinWith('cau');
        $query->joinWith('dangthantru');
        
        $query->andFilterWhere(['like', 'kyhieu', $this->kyhieu])
                ->andFilterWhere(['like', 'tb_cau.ten', $this->id_cau])
                ->andFilterWhere(['like', 'tb_cau_thongtinchung.ten', $this->thantru_dang])
                ->andFilterWhere(['like', 'thantru_chieucao', $this->thantru_chieucao]);

        return $dataProvider;
    }

}
