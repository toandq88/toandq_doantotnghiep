<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Cau;

/**
 * CauSearch represents the model behind the search form of `frontend\models\Cau`.
 */
class CauSearch extends Cau {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_cau', 'kmchinh', 'kmle', 'loailanduong', 'dangcau', 'namxaydung', 'namduavaokhaithac', 'chaychungvoi_duongsat', 'chaychungvoi_congtrinhthuyloi', 'bienbao_tencau', 'dongchay_nhiemman', 'dongchay_lulut', 'dongchay_thongthuyen', 'dongchay_capsong'], 'integer'],
            [['sohieu', 'id_tuyenduong', 'doituongvuot', 'ten', 'berongcau', 'tensongsuoi', 'vido', 'kinhdo', 'id_tinh', 'id_huyen', 'id_xa', 'sodonhip', 'donvixaydungcau', 'bienbao_khac', 'dongchay_thoikylu', 'file', 'nguoitao', 'ngaytao', 'nguoisua', 'ngaysua'], 'safe'],
            [['gocgiao', 'chieudai', 'sonhip', 'berongphanxechay', 'berongphanbohanh',  'taitrongkhaithac', 'tinhkhong_vemuakho', 'tinhkhong_vemualu', 'tinhkhong_codinh', 'tinhkhong_thongthuyen', 'tinhkhong_trencau', 'bienbao_taitrong', 'bienbao_tocdo', 'bienbao_culyxe', 'bienbao_chieucao', 'bienbao_chieurong', 'dongchay_thuytrieu'], 'number'],
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
        $query = Cau::find();

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
            'id_cau' => $this->id_cau,
            //'id_tuyenduong' => $this->id_tuyenduong,
            //'doituongvuot' => $this->doituongvuot,
            'gocgiao' => $this->gocgiao,
            'kmchinh' => $this->kmchinh,
            'kmle' => $this->kmle,
            'loailanduong' => $this->loailanduong,
            'dangcau' => $this->dangcau,
            //'chieudai' => $this->chieudai,
            'sonhip' => $this->sonhip,
            //'berongcau' => $this->berongcau,
            'berongphanxechay' => $this->berongphanxechay,
            'berongphanbohanh' => $this->berongphanbohanh,
            //'taitrongthietke' => $this->taitrongthietke,
            'namxaydung' => $this->namxaydung,
            'taitrongkhaithac' => $this->taitrongkhaithac,
            'namduavaokhaithac' => $this->namduavaokhaithac,
            'chaychungvoi_duongsat' => $this->chaychungvoi_duongsat,
            'chaychungvoi_congtrinhthuyloi' => $this->chaychungvoi_congtrinhthuyloi,
            'tinhkhong_vemuakho' => $this->tinhkhong_vemuakho,
            'tinhkhong_vemualu' => $this->tinhkhong_vemualu,
            'tinhkhong_codinh' => $this->tinhkhong_codinh,
            'tinhkhong_thongthuyen' => $this->tinhkhong_thongthuyen,
            'tinhkhong_trencau' => $this->tinhkhong_trencau,
            'bienbao_tencau' => $this->bienbao_tencau,
            'bienbao_taitrong' => $this->bienbao_taitrong,
            'bienbao_tocdo' => $this->bienbao_tocdo,
            'bienbao_culyxe' => $this->bienbao_culyxe,
            'bienbao_chieucao' => $this->bienbao_chieucao,
            'bienbao_chieurong' => $this->bienbao_chieurong,
            'dongchay_thuytrieu' => $this->dongchay_thuytrieu,
            'dongchay_nhiemman' => $this->dongchay_nhiemman,
            'dongchay_lulut' => $this->dongchay_lulut,
            'dongchay_thongthuyen' => $this->dongchay_thongthuyen,
            'dongchay_capsong' => $this->dongchay_capsong,
            'ngaytao' => $this->ngaytao,
            'ngaysua' => $this->ngaysua,
        ]);

        $query->joinWith('tuyenduong');
        $query->joinWith('loaidoituongvuot');
        $query->joinWith('vntinh');
        $query->joinWith('vnhuyen');
        
        $query->andFilterWhere(['like', 'sohieu', $this->sohieu])
                ->andFilterWhere(['like', 'tb_cau.ten', $this->ten])
                ->andFilterWhere(['like', 'tb_tuyenduong.mahieu', $this->id_tuyenduong])
                ->andFilterWhere(['like', 'tb_cau_thongtinchung.ten', $this->doituongvuot])
                ->andFilterWhere(['like', 'chieudai', $this->chieudai])
                ->andFilterWhere(['like', 'berongcau', $this->berongcau])
                ->andFilterWhere(['like', 'tensongsuoi', $this->tensongsuoi])
                ->andFilterWhere(['like', 'vido', $this->vido])
                ->andFilterWhere(['like', 'kinhdo', $this->kinhdo])
                ->andFilterWhere(['like', 'vn_tinh.ten', $this->id_tinh])
                ->andFilterWhere(['like', 'vn_huyen.ten', $this->id_huyen])
                ->andFilterWhere(['like', 'id_xa', $this->id_xa])
                ->andFilterWhere(['like', 'sodonhip', $this->sodonhip])
                ->andFilterWhere(['like', 'theoquytrinh', $this->theoquytrinh])
                ->andFilterWhere(['like', 'donvixaydungcau', $this->donvixaydungcau])
                ->andFilterWhere(['like', 'bienbao_khac', $this->bienbao_khac])
                ->andFilterWhere(['like', 'dongchay_thoikylu', $this->dongchay_thoikylu])
                ->andFilterWhere(['like', 'file', $this->file])
                ->andFilterWhere(['like', 'nguoitao', $this->nguoitao])
                ->andFilterWhere(['like', 'nguoisua', $this->nguoisua]);

        return $dataProvider;
    }

}
