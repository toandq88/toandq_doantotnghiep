<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_cau_loai".
 *
 * @property int $id_loai
 * @property string $ten
 * @property string $loai
 * @property int $thutu
 */
class CauThongtinchung extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tb_cau_thongtinchung';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ten', 'loai', 'thutu'], 'required', 'message' => 'Vui lòng nhập thông tin {attribute}.'],
            [['ten'], 'string', 'max' => 100],
            [['loai'], 'string', 'max' => 50],
            [['thutu'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_loai' => 'ID',
            'ten' => 'Tên',
            'loai' => 'Loại',
            'thutu' => 'Thứ tự',
        ];
    }

}
