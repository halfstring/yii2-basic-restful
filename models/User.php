<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "restful_user".
 *
 * @property int $id
 * @property string $name 用户名称
 * @property int $age 年龄
 * @property string $mobile 手机号
 * @property string $address 地址
 * @property int $create_at 创建时间
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'restful_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['age', 'create_at'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['mobile'], 'string', 'max' => 11],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'age' => 'Age',
            'mobile' => 'Mobile',
            'address' => 'Address',
            'create_at' => 'Create At',
        ];
    }
}
