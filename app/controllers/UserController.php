<?php

namespace app\controllers;


use app\models\User;
use yii\rest\Controller;

class UserController extends Controller
{
    public function actionIndex()
    {

        if (!YII_DEBUG) {
            return 'Yii debug off, :)';
        }

        $faker = \Faker\Factory::create('ru_RU');

        $user = new User();
        $user->login = $faker->userName;
        $user->password = $user->login;

        if (!$user->save()) {
            return $user->getErrors();
        }

        return $user->getAttributes(['login', 'password', 'token']);
    }

    public function actionSignIn()
    {
        $request = \Yii::$app->getRequest();


        /** @var User $user */
        $user = User::findOne(['login' => $request->post('login')]);

        if ($user && $user->passwordValidate($request->post('password'))) {
            return $user->getAttributes(['login', 'token']);
        }

        return ['error' => 'Username or password is incorrect'];
    }
}