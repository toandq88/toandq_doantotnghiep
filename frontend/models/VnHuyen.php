<?php

namespace frontend\models;

use Yii;
use \frontend\models\VnTinh;

/**
 * This is the model class for table "vn_huyen".
 *
 * @property string $id_huyen
 * @property string $ten
 * @property string $loai
 * @property string $vitri
 * @property string $id_tinh
 *
 * @property VnTinh $vnTinh
 */
class VnHuyen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vn_huyen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_huyen', 'ten', 'loai', 'vitri', 'id_tinh'], 'required'],
            [['id_huyen', 'id_tinh'], 'string', 'max' => 5],
            [['ten'], 'string', 'max' => 100],
            [['loai', 'vitri'], 'string', 'max' => 30],
            [['id_huyen'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_huyen' => 'Mã',
            'ten' => 'Tên',
            'loai' => 'Loại',
            'vitri' => 'Vị trí',
            'id_tinh' => 'Thuộc Tỉnh / Thành phố',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTinh()
    {
        return $this->hasOne(VnTinh::className(), ['id_tinh' => 'id_tinh']);
    }
}
