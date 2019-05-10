<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CauCatngangmatcau;

/**
 * CauCatngangmatcauSearch represents the model behind the search form of `frontend\models\CauCatngangmatcau`.
 */
class CauCatngangmatcauSearch extends CauCatngangmatcau {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['id_catngangmatcau', 'phanxechay_solanxe'], 'integer'],
                [['nhipcungdang', 'id_cau'], 'safe'],
                [['chieurongtoancau', 'phanxechay_chieurong', 'phancach_berongphancachgiua', 'phancach_berongphancachbien', 'duongbohanh_berong', 'duongbohanh_beronglancan'], 'number'],
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
        $query = CauCatngangmatcau::find();

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
            'id_catngangmatcau' => $this->id_catngangmatcau,
            //'id_cau' => $this->id_cau,
            'chieurongtoancau' => $this->chieurongtoancau,
            'phanxechay_chieurong' => $this->phanxechay_chieurong,
            'phanxechay_solanxe' => $this->phanxechay_solanxe,
            'phancach_berongphancachgiua' => $this->phancach_berongphancachgiua,
            'phancach_berongphancachbien' => $this->phancach_berongphancachbien,
            'duongbohanh_berong' => $this->duongbohanh_berong,
            'duongbohanh_beronglancan' => $this->duongbohanh_beronglancan,
        ]);

        $query->joinWith('cau');

        $query->andFilterWhere(['like', 'nhipcungdang', $this->nhipcungdang])
                ->andFilterWhere(['like', 'tb_cau.ten', $this->id_cau]);

        return $dataProvider;
    }

}
