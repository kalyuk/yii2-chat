<?php

namespace app\models;

use Yii;

class Polling extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polling';
    }

    public static function getDb()
    {
        return Yii::$app->pollingDb;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['to_id', 'from_id'], 'required']
        ];
    }


}
