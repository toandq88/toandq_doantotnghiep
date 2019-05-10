<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CauThietbicongcongtrencau;

/**
 * CauThietbicongcongtrencauSearch represents the model behind the search form of `frontend\models\CauThietbicongcongtrencau`.
 */
class CauThietbicongcongtrencauSearch extends CauThietbicongcongtrencau {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_thietbicongcong', 'thutu'], 'integer'],
            [['tenloai', 'coquanchuquan', 'ghichu', 'id_cau'], 'safe'],
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
        $query = CauThietbicongcongtrencau::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id_thietbicongcong' => $this->id_thietbicongcong,
            //'id_cau' => $this->id_cau,
            'thutu' => $this->thutu,
        ]);

        $query->andFilterWhere(['like', 'tenloai', $this->tenloai])
                ->andFilterWhere(['like', 'coquanchuquan', $this->coquanchuquan])
                ->andFilterWhere(['like', 'ghichu', $this->ghichu])
                ->andFilterWhere(['like', 'tb_cau.ten', $this->id_cau]);

        return $dataProvider;
    }

}
