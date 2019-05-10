<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_donvi".
 *
 * @property int $id_donvi
 * @property string $ten
 * @property string $tenviettat
 * @property string $diachi
 * @property string $email
 * @property string $dienthoai
 * @property string $website
 * @property string $hinhanh
 * @property string $mota
 * @property int $ngaytao
 * @property int $loaidonvi 1-Quản lý, vận hành; 2-Sửa chữa,, xây dựng
 */
class Donvi extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_donvi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten', 'tenviettat', 'diachi', 'email', 'ngaytao', 'loaidonvi'], 'required'],
            [['mota'], 'string'],
            [['ngaytao'], 'integer'],
            [['ten', 'hinhanh', 'diachi', 'email'], 'string', 'max' => 255, 'message'=>'{attribute} phải là chuỗi.'],
            [['tenviettat', 'website'], 'string', 'max' => 50],
            [['dienthoai'], 'string', 'max' => 20],
            [['loaidonvi'], 'string', 'max' => 1],
            [['tenviettat'], 'unique'],
            [['hinhanh'],'image','extensions'=>'jpg,png,gif', 'maxSize' => 1024*1024*10, 'minWidth' => 100, 'minHeight' => 100],   //10Mb
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_donvi' => 'ID',
            'ten' => 'Tên Đơn vị',
            'tenviettat' => 'Tên viết tắt',
            'diachi' => 'Địa chỉ',
            'email' => 'Email',
            'dienthoai' => 'Điện thoại',
            'website' => 'Website',
            'hinhanh' => 'Logo',
            'mota' => 'Mô tả',
            'ngaytao' => 'Ngày tạo',
            'loaidonvi' => 'Loại đơn vị',
        ];
    }
}
