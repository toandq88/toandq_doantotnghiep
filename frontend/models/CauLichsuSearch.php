<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CauLichsu;

/**
 * CauLichsuSearch represents the model behind the search form of `frontend\models\CauLichsu`.
 */
class CauLichsuSearch extends CauLichsu {

    // This attribute will hold the values to filter our database data
    public $created_at_range;
    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['id'], 'integer'],
                [['id_cau', 'ngaythangnam', 'noidung', 'created_at_range'], 'safe'],
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
        $query = CauLichsu::find();

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
            'id' => $this->id,
            //'id_cau' => $this->id_cau,
            //'ngaythangnam' => $this->ngaythangnam,
        ]);

        $query->joinWith('cau');

        $query->andFilterWhere(['like', 'noidung', $this->noidung])
                //->andFilterWhere(['like', 'ngaythangnam', $this->ngaythangnam])
                ->andFilterWhere(['like', 'tb_cau.ten', $this->id_cau]);

        // do we have values? if so, add a filter to our query
        if(!empty($this->created_at_range) && strpos($this->created_at_range, '-') !== false) {
                list($start_date, $end_date) = explode(' - ', $this->created_at_range);
                $query->andFilterWhere(['between', 'tb_cau_lichsu.ngaythangnam', date('Y-m-d',strtotime($start_date)), date('Y-m-d',strtotime($end_date)) ]);
        }
        
        return $dataProvider;
    }

}
