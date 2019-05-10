<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "vn_tinh".
 *
 * @property string $id_tinh
 * @property string $ten
 * @property string $loai
 *
 * @property VnHuyen $tinh
 */
class VnTinh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vn_tinh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tinh', 'ten', 'loai'], 'required'],
            [['id_tinh'], 'string', 'max' => 5],
            [['ten'], 'string', 'max' => 100],
            [['loai'], 'string', 'max' => 30],
            [['id_tinh'], 'unique'],
            [['id_tinh'], 'exist', 'skipOnError' => true, 'targetClass' => VnHuyen::className(), 'targetAttribute' => ['id_tinh' => 'id_tinh']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tinh' => 'Mã',
            'ten' => 'Tên',
            'loai' => 'Loại',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTinh()
    {
        return $this->hasOne(VnHuyen::className(), ['id_tinh' => 'id_tinh']);
    }
}
