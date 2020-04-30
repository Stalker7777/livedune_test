<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "billing".
 *
 * @property integer $id
 * @property integer $users_id
 * @property double $amount
 * @property integer $payment date
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Users $users
 */
class Billing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'billing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['users_id', 'amount', 'payment date', 'created_at'], 'required'],
            [['users_id', 'payment date', 'created_at', 'updated_at'], 'integer'],
            [['amount'], 'number'],
            [['users_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['users_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users_id' => 'Users ID',
            'amount' => 'Amount',
            'payment date' => 'Payment Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'users_id']);
    }
}
