<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CauChongthamvathoatnuoc;

/**
 * CauChongthamvathoatnuocSearch represents the model behind the search form of `frontend\models\CauChongthamvathoatnuoc`.
 */
class CauChongthamvathoatnuocSearch extends CauChongthamvathoatnuoc {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['id_chongtham', 'thutu'], 'integer'],
                [['vitri', 'id_cau', 'ghichu'], 'safe'],
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
        $query = CauChongthamvathoatnuoc::find();

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
            'id_chongtham' => $this->id_chongtham,
            //'id_cau' => $this->id_cau,
            'thutu' => $this->thutu,
        ]);

        $query->joinWith('cau');

        $query->andFilterWhere(['like', 'vitri', $this->vitri])
                ->andFilterWhere(['like', 'tb_cau.ten', $this->id_cau])
                ->andFilterWhere(['like', 'ghichu', $this->ghichu]);

        return $dataProvider;
    }

}
