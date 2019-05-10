<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CauKetcaunhip;

/**
 * CauKetcaunhipSearch represents the model behind the search form of `frontend\models\CauKetcaunhip`.
 */
class CauKetcaunhipSearch extends CauKetcaunhip {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_ketcaunhip', 'doccau_chieudainhip', 'doccau_culytimgoi', 'ngangcau_dangdamchu', 'ngangcau_sodamchu', 'ngangcau_dangdamngang', 'ngangcau_loaibanmatcau', 'ngangcau_dangketcauvom'], 'integer'],
            [['kyhieunhip', 'id_cau', 'ngangcau_dangdamdocphu', 'doccau_sodoketcau'], 'safe'], //, 'doccau_dangketcau'
            [['ngangcau_culydam', 'ngangcau_chieucaodamchu'], 'number'],
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
        $query = CauKetcaunhip::find();

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
            'id_ketcaunhip' => $this->id_ketcaunhip,
            //'id_cau' => $this->id_cau,
            //'doccau_sodoketcau' => $this->doccau_sodoketcau,
            //'doccau_dangketcau' => $this->doccau_dangketcau,
            'doccau_chieudainhip' => $this->doccau_chieudainhip,
            'doccau_culytimgoi' => $this->doccau_culytimgoi,
            'doccau_loaivuot' => $this->doccau_loaivuot,
            'doccau_loaimatduongtrencau' => $this->doccau_loaimatduongtrencau,
            'doccau_vatlieuduongbohanh' => $this->doccau_vatlieuduongbohanh,
            'doccau_vatlieulancantayvin' => $this->doccau_vatlieulancantayvin,
            'ngangcau_dangdamchu' => $this->ngangcau_dangdamchu,
            'ngangcau_sodamchu' => $this->ngangcau_sodamchu,
            'ngangcau_culydam' => $this->ngangcau_culydam,
            'ngangcau_chieucaodamchu' => $this->ngangcau_chieucaodamchu,
            'ngangcau_dangdamngang' => $this->ngangcau_dangdamngang,
            'ngangcau_loaibanmatcau' => $this->ngangcau_loaibanmatcau,
            'ngangcau_dangketcauvom' => $this->ngangcau_dangketcauvom,
        ]);

        $query->joinWith('cau');
        $query->joinWith('loaisodoketcau');
        //$query->joinWith('loaidangketcau');

        $query->andFilterWhere(['like', 'kyhieunhip', $this->kyhieunhip])
                ->andFilterWhere(['like', 'tb_cau.ten', $this->id_cau])
                ->andFilterWhere(['like', 'tb_cau_thongtinchung.ten', $this->doccau_sodoketcau])
                //->andFilterWhere(['like', 'tb_cau_thongtinchung.ten', $this->doccau_dangketcau])
                ->andFilterWhere(['like', 'ngangcau_dangdamdocphu', $this->ngangcau_dangdamdocphu]);

        return $dataProvider;
    }

}
