<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property integer $state
 * @property string $token
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Friend[] $friends
 * @property Friend[] $friends0
 * @property Message[] $messages
 * @property Message[] $messages0
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password', 'state', 'token', 'created_at'], 'required'],
            [['state'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['login'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 128],
            [['token'], 'string', 'max' => 128],
            [['login'], 'unique'],
            [['token'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'state' => 'State',
            'token' => 'Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFriends()
    {
        return $this->hasMany(Friend::className(), ['friend_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFriends0()
    {
        return $this->hasMany(Friend::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['to_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages0()
    {
        return $this->hasMany(Message::className(), ['from_id' => 'id']);
    }
}
