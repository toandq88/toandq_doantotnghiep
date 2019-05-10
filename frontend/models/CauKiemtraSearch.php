<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CauKiemtra;

/**
 * CauKiemtraSearch represents the model behind the search form of `frontend\models\CauKiemtra`.
 */
class CauKiemtraSearch extends CauKiemtra {

    // This attribute will hold the values to filter our database data
    public $created_at_range;
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_kiemtra'], 'integer'],
            [['ngaykiemtra', 'noidung', 'ketluan', 'cansuachua', 'nguoitao', 'nguoisua', 'ngaysua', 'id_donvikiemtra', 'id_mucdokiemtra', 'id_cau', 'created_at_range'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = CauKiemtra::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id_kiemtra' => $this->id_kiemtra,
            //'id_cau' => $this->id_cau,
            //'id_donvikiemtra' => $this->id_donvikiemtra,
            //'ngaykiemtra' => $this->ngaykiemtra,
            //'id_mucdokiemtra' => $this->id_mucdokiemtra,
            //'ngaytao' => $this->ngaytao,
            'ngaysua' => $this->ngaysua,
        ]);

        $query->andFilterWhere(['like', 'noidung', $this->noidung])
                ->andFilterWhere(['like', 'ketluan', $this->ketluan])
                ->andFilterWhere(['like', 'cansuachua', $this->cansuachua])
                ->andFilterWhere(['like', 'nguoitao', $this->nguoitao])
                ->andFilterWhere(['like', 'nguoisua', $this->nguoisua])
                ->andFilterWhere(['like', 'tb_cau.ten', $this->id_cau])
                ->andFilterWhere(['like', 'tb_donvi.tenviettat', $this->id_donvikiemtra])
                ->andFilterWhere(['like', 'tb_cau_kiemtra_mucdo.ten', $this->id_mucdokiemtra]);
        
        // do we have values? if so, add a filter to our query
        if(!empty($this->created_at_range) && strpos($this->created_at_range, '-') !== false) {
                list($start_date, $end_date) = explode(' - ', $this->created_at_range);
                $query->andFilterWhere(['between', 'tb_cau_kiemtra.ngaykiemtra', date('Y-m-d',strtotime($start_date)), date('Y-m-d',strtotime($end_date)) ]);
        }

        return $dataProvider;
    }

}
