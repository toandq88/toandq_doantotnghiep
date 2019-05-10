<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tuyenduong;

/**
 * TuyenduongSearch represents the model behind the search form of `frontend\models\Tuyenduong`.
 */
class TuyenduongSearch extends Tuyenduong
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tuyenduong', 'tukmchinh', 'tukmle', 'denkmchinh', 'denkmle', 'solanxecogioi'], 'integer'],
            [['mahieu', 'tenduong', 'capduong', 'vidodau', 'kinhdodau', 'vidocuoi', 'kinhdocuoi', 'namhoanthanhxaydung', 'nguoitao', 'ngaytao', 'nguoisua', 'ngaysua', 'id_donviquanly'], 'safe'],
            [['chieudaithucte', 'tocdothietke'], 'number'],
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
        $query = Tuyenduong::find();

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

        $query->joinWith('donvi');
        
        // grid filtering conditions
        $query->andFilterWhere([
            'id_tuyenduong' => $this->id_tuyenduong,
            //'id_donviquanly' => $this->id_donviquanly,
            'tukmchinh' => $this->tukmchinh,
            'tukmle' => $this->tukmle,
            'denkmchinh' => $this->denkmchinh,
            'denkmle' => $this->denkmle,
            'chieudaithucte' => $this->chieudaithucte,
            'namhoanthanhxaydung' => $this->namhoanthanhxaydung,
            'solanxecogioi' => $this->solanxecogioi,
            'tocdothietke' => $this->tocdothietke,
            'ngaytao' => $this->ngaytao,
            'ngaysua' => $this->ngaysua,
        ]);

        $query->andFilterWhere(['like', 'mahieu', $this->mahieu])
            ->andFilterWhere(['like', 'tenduong', $this->tenduong])
            ->andFilterWhere(['like', 'capduong', $this->capduong])
            ->andFilterWhere(['like', 'vidodau', $this->vidodau])
            ->andFilterWhere(['like', 'kinhdodau', $this->kinhdodau])
            ->andFilterWhere(['like', 'vidocuoi', $this->vidocuoi])
            ->andFilterWhere(['like', 'kinhdocuoi', $this->kinhdocuoi])
            ->andFilterWhere(['like', 'nguoitao', $this->nguoitao])
            ->andFilterWhere(['like', 'nguoisua', $this->nguoisua])
            ->andFilterWhere(['like', 'tb_donvi.tenviettat', $this->id_donviquanly]);
        
        return $dataProvider;
    }
}
