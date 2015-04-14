<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 14.04.2015
 * Time: 18:39
 */

namespace app\models;


class Message extends base\Message
{
    const STATE_ACTIVE = 1;
    const STATE_DELETE = 0;

    public static function getLastByFriendId($friendId){
        return self::find()
            ->orWhere([
                'to_id' => \Yii::$app->getUser()->getId(),
                'from_id' => $friendId
            ])
            ->orWhere([
                'from_id' => \Yii::$app->getUser()->getId(),
                'to_id' => $friendId
            ])
            ->andWhere(['state' => self::STATE_ACTIVE])
            ->orderBy(['id' => SORT_DESC])
            ->limit(100)
            ->all();
    }

    public function beforeValidate(){

        if ($this->isNewRecord) {
            $this->created_at = date('Y-m-d H:m:s');
            $this->state = self::STATE_ACTIVE;
        }

        $this->updated_at = date('Y-m-d H:m:s');

        return parent::beforeValidate();
    }

    public function getTo()
    {
        return $this->hasOne(User::className(), ['id' => 'to_id'])->from(User::tableName() . ' ut');
    }

    public function getFrom()
    {
        return $this->hasOne(User::className(), ['id' => 'from_id'])->from(User::tableName() . ' uf');
    }
}