<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CauThongtinduungluc;

/**
 * CauThongtinduunglucSearch represents the model behind the search form of `frontend\models\CauThongtinduungluc`.
 */
class CauThongtinduunglucSearch extends CauThongtinduungluc {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_thongtinduungluc', 'thutu'], 'integer'],
            [['bophanketcau', 'ghichu', 'id_cau', 'loaiduungluc'], 'safe'],
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
        $query = CauThongtinduungluc::find();

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

        $query->joinWith('cau');
        $query->joinWith('duungluc');

        // grid filtering conditions
        $query->andFilterWhere([
            'id_thongtinduungluc' => $this->id_thongtinduungluc,
            //'id_cau' => $this->id_cau,
            'thutu' => $this->thutu,
                //'loaiduungluc' => $this->loaiduungluc,
        ]);

        $query->andFilterWhere(['like', 'bophanketcau', $this->bophanketcau])
                ->andFilterWhere(['like', 'tb_cau.ten', $this->id_cau])
                ->andFilterWhere(['like', 'tb_cau_thongtinchung.ten', $this->loaiduungluc])
                ->andFilterWhere(['like', 'ghichu', $this->ghichu]);

        return $dataProvider;
    }

}
