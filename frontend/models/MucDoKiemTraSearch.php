<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\MucDoKiemTra;

/**
 * MucDoKiemTraSearch represents the model behind the search form of `frontend\models\MucDoKiemTra`.
 */
class MucDoKiemTraSearch extends MucDoKiemTra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mucdo'], 'integer'],
            [['ten', 'thutu'], 'safe'],
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
        $query = MucDoKiemTra::find();

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
            'id_mucdo' => $this->id_mucdo,
        ]);

        $query->andFilterWhere(['like', 'ten', $this->ten])
            ->andFilterWhere(['like', 'thutu', $this->thutu]);

        return $dataProvider;
    }
}
