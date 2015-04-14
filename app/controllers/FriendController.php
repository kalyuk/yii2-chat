<?php


namespace app\controllers;


use app\filters\HeaderToken;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class FriendController extends ActiveController
{

    public $modelClass = 'app\models\Friend';

    // TODO Не вынес бихевер, так как использются разные виды контроллеров
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HeaderToken::className(),
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['delete'], $actions['create']);
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider()
    {
        return new ActiveDataProvider([
            'query' => User::getFriendsQuery(['uf.login', 'uf.id']),
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);
    }
}