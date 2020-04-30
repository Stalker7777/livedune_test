<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $address
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Billing[] $billings
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'address', 'created_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'surname', 'patronymic', 'address'], 'string', 'max' => 255],
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
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'address' => 'Address',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBillings()
    {
        return $this->hasMany(Billing::className(), ['users_id' => 'id']);
    }
}
