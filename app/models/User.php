<?php


namespace app\models;


use yii\web\IdentityInterface;

class User extends base\User implements IdentityInterface
{

    const STATE_ONLINE = 1;
    const STATE_OFFLINE = 0;

    public function extraFields()
    {
        return ['friends'];
    }

    public function beforeSave($insert)
    {
        $this->password = \Yii::$app->getSecurity()->generatePasswordHash($this->password);

        return parent::beforeSave($insert);
    }

    public function beforeValidate()
    {

        if ($this->isNewRecord) {
            $this->created_at = date('Y-m-d H:m:s');
            $this->token = \Yii::$app->getSecurity()->generateRandomString(128);
            $this->state = self::STATE_ONLINE;
        }

        $this->updated_at = date('Y-m-d H:m:s');

        return parent::beforeValidate();
    }

    public static function findIdentity($id)
    {
        return self::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {

    }

    public function validateAuthKey($authKey)
    {

    }


    public function getSubscribers()
    {
        return $this->hasMany(Friend::className(), ['friend_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFriends()
    {
        return $this->hasMany(Friend::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSentMessages()
    {
        return $this->hasMany(Message::className(), ['to_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncomingMessages()
    {
        return $this->hasMany(Message::className(), ['from_id' => 'id']);
    }

    public function passwordValidate($password)
    {
        return \Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public static function getFriendsQuery(array $attr = ['*'])
    {
        return self::find()
            ->select($attr)
            ->joinWith(['friends.friend'])
            ->where(['friend.user_id' => \Yii::$app->getUser()->getId()]);
    }
}