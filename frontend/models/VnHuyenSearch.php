<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\VnHuyen;

/**
 * VnHuyenSearch represents the model behind the search form of `frontend\models\VnHuyen`.
 */
class VnHuyenSearch extends VnHuyen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_huyen', 'ten', 'loai', 'vitri', 'id_tinh'], 'safe'],
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
        $query = VnHuyen::find();

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
        
        $query ->joinWith('tinh');
        
        // grid filtering conditions
        $query->andFilterWhere(['like', 'id_huyen', $this->id_huyen])
            ->andFilterWhere(['like', 'vn_huyen.ten', $this->ten])
            ->andFilterWhere(['like', 'vn_huyen.loai', $this->loai])
            ->andFilterWhere(['like', 'vitri', $this->vitri])
            ->andFilterWhere(['like', 'vn_tinh.ten', $this->id_tinh]);

        return $dataProvider;
    }
}
