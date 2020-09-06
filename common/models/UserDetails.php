<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_details".
 *
 * @property int $id
 * @property string $name
 * @property int|null $user_id
 * @property string|null $street
 * @property string|null $city
 * @property int $zip
 * @property string|null $state
 * @property string|null $country
 * @property int|null $delivery_type
 * @property int|null $created_by
 * @property string|null $created_at
 *
 * @property User $createdBy
 * @property User $user
 */
class UserDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'zip'], 'required'],
            [['user_id', 'zip', 'delivery_type', 'created_by'], 'integer'],
            [['name', 'street', 'city', 'state', 'country', 'created_at'], 'string', 'max' => 16],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'user_id' => 'User ID',
            'street' => 'Street',
            'city' => 'City',
            'zip' => 'Zip',
            'state' => 'State',
            'country' => 'Country',
            'delivery_type' => 'Delivery Type',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return UserDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserDetailsQuery(get_called_class());
    }
}
