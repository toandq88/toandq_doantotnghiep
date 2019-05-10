<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_cau_baotri_mucdo".
 *
 * @property int $id_mucdo
 * @property string $ten_mucdo
 * @property int $thutu
 */
class MucDoBaoTri extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_cau_baotri_mucdo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_mucdo', 'thutu'], 'required'],
            [['thutu'], 'integer'],
            [['ten_mucdo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mucdo' => 'ID',
            'ten_mucdo' => 'Tên',
            'thutu' => 'Thứ tự',
        ];
    }
}
