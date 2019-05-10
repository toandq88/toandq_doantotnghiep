<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CauHinhanh;

/**
 * CauHinhanhSearch represents the model behind the search form of `frontend\models\CauHinhanh`.
 */
class CauHinhanhSearch extends CauHinhanh {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_hinhanh'], 'integer'],
            [['id_cau', 'noidung', 'loai'], 'safe'],
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
        $query = CauHinhanh::find();

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
            'id_hinhanh' => $this->id_hinhanh,
            //'id_cau' => $this->id_cau,
        ]);

        $query->joinWith('cau');

        $query->andFilterWhere(['like', 'file', $this->file])
                ->andFilterWhere(['like', 'tb_cau.ten', $this->id_cau])
                ->andFilterWhere(['like', 'loai', $this->loai])
                ->andFilterWhere(['like', 'noidung', $this->noidung]);

        return $dataProvider;
    }

}
