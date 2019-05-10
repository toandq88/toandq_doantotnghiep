<?php

namespace frontend\models;

use Yii;
use \frontend\models\VnHuyen;

/**
 * This is the model class for table "vn_xa".
 *
 * @property string $id_xa
 * @property string $ten
 * @property string $loai
 * @property string $vitri
 * @property string $id_huyen
 */
class VnXa extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'vn_xa';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_xa', 'ten', 'loai', 'vitri', 'id_huyen'], 'required'],
            [['id_xa', 'id_huyen'], 'string', 'max' => 5],
            [['ten'], 'string', 'max' => 100],
            [['loai', 'vitri'], 'string', 'max' => 30],
            [['id_xa'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_xa' => 'Mã',
            'ten' => 'Tên',
            'loai' => 'Loại',
            'vitri' => 'Vị trí',
            'id_huyen' => 'Thuộc Quận / Huyện',
        ];
    }

    public function getHuyen() {
        return $this->hasOne(VnHuyen::className(), ['id_huyen' => 'id_huyen']);
    }
}
