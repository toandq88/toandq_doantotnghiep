<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\VnXa;

/**
 * VnXaSearch represents the model behind the search form of `frontend\models\VnXa`.
 */
class VnXaSearch extends VnXa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_xa', 'ten', 'loai', 'vitri', 'id_huyen'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = VnXa::find();

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
        
        $query ->joinWith('huyen');
        
        // grid filtering conditions
        $query->andFilterWhere(['like', 'id_xa', $this->id_xa])
            ->andFilterWhere(['like', 'vn_xa.ten', $this->ten])
            ->andFilterWhere(['like', 'vn_xa.loai', $this->loai])
            ->andFilterWhere(['like', 'vn_xa.vitri', $this->vitri])
            ->andFilterWhere(['like', 'vn_huyen.ten', $this->id_huyen]);

        return $dataProvider;
    }
}
