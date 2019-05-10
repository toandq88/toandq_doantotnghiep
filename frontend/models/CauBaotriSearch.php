<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CauBaotri;

/**
 * CauBaotriSearch represents the model behind the search form of `frontend\models\CauBaotri`.
 */
class CauBaotriSearch extends CauBaotri {

    public $created_at_range;
    public $created_at_range2;
    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_baotri', 'nguoitao', 'nguoisua'], 'integer'],
            [['ngaybatdau', 'ngayketthuc', 'noidung', 'ghichu', 'file', 'ngaytao', 'ngaysua', 'id_donvithuchien', 'id_mucdobaotri', 'id_cau', 'id_kiemtra', 'created_at_range', 'created_at_range2'], 'safe'],
            [['giatri'], 'number'],
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
        $query = CauBaotri::find();

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
        $query->joinWith('donvi');
        $query->joinWith('mucdo');
        $query->joinWith('dotkiemtra');

        // grid filtering conditions
        $query->andFilterWhere([
            'id_baotri' => $this->id_baotri,
            //'id_cau' => $this->id_cau,
            //'id_kiemtra' => $this->id_kiemtra,
            //'ngaybatdau' => $this->ngaybatdau,
            //'ngayketthuc' => $this->ngayketthuc,
            //'id_mucdobaotri' => $this->id_mucdobaotri,
            'giatri' => $this->giatri,
            //'id_donvithuchien' => $this->id_donvithuchien,
            'nguoitao' => $this->nguoitao,
            'ngaytao' => $this->ngaytao,
            'nguoisua' => $this->nguoisua,
            'ngaysua' => $this->ngaysua,
        ]);

        $query->andFilterWhere(['like', 'noidung', $this->noidung])
                ->andFilterWhere(['like', 'file', $this->file])
                ->andFilterWhere(['like', 'ghichu', $this->ghichu])
                ->andFilterWhere(['like', 'tb_cau.ten', $this->id_cau])
                ->andFilterWhere(['like', 'tb_donvi.tenviettat', $this->id_donvithuchien])
                ->andFilterWhere(['like', 'tb_cau_baotri_mucdo.ten_mucdo', $this->id_mucdobaotri])
                ->andFilterWhere(['like', 'tb_cau_kiemtra.ngaykiemtra', $this->id_kiemtra]);

        // do we have values? if so, add a filter to our query
        if(!empty($this->created_at_range) && strpos($this->created_at_range, '-') !== false) {
                list($start_date, $end_date) = explode(' - ', $this->created_at_range);
                $query->andFilterWhere(['between', 'tb_cau_baotri.ngaybatdau', date('Y-m-d',strtotime($start_date)), date('Y-m-d',strtotime($end_date)) ]);
        }
        
        // do we have values? if so, add a filter to our query
        if(!empty($this->created_at_range2) && strpos($this->created_at_range2, '-') !== false) {
                list($start_date2, $end_date2) = explode(' - ', $this->created_at_range2);
                $query->andFilterWhere(['between', 'tb_cau_baotri.ngayketthuc', date('Y-m-d',strtotime($start_date2)), date('Y-m-d',strtotime($end_date2)) ]);
        }
        
        return $dataProvider;
    }

}
