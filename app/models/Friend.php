<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 14.04.2015
 * Time: 18:40
 */

namespace app\models;


class Friend extends base\Friend
{
    public function extraFields()
    {
        return ['user'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFriend()
    {
        return $this->hasOne(User::className(), ['id' => 'friend_id'])->from(User::tableName() . ' uf');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id'])->from(User::tableName() . ' uu');
    }
}