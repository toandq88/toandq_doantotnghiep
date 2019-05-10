<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_cau_kiemtra_mucdo".
 *
 * @property int $id_mucdo
 * @property string $ten
 * @property int $thutu
 *
 * @property TbCauKiemtra $mucdo
 */
class MucDoKiemTra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_cau_kiemtra_mucdo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten', 'thutu'], 'required'],
            [['ten'], 'string', 'max' => 255],
            [['thutu'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_mucdo' => 'ID',
            'ten' => 'Tên',
            'thutu' => 'Thứ tự',
        ];
    }
}
