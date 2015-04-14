<?php
namespace app\controllers;


use app\models\Polling AS PollingModel;
use app\filters\HeaderToken;
use app\models\Message;
use yii\rest\Controller;

class MessageController extends Controller
{
    // TODO Не вынес бихевер, так как использются разные виды контроллеров
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HeaderToken::className(),
        ];
        return $behaviors;
    }

    public function actionIndex($friendId)
    {
        // TODO можно сделать в роуте (\d+)
        return Message::getLastByFriendId((int)$friendId);
    }

    public function actionCreate()
    {
        $request = \Yii::$app->getRequest();

        $message = new Message();
        $message->setAttributes([
            'message' => $request->post('message'),
            'to_id' => $request->post('to_id')
        ]);

        $message->setAttribute('from_id', \Yii::$app->getUser()->getId());

        if ($message->save()) {
            $polling = new PollingModel();
            $polling->setAttribute('to_id', $request->post('to_id'));
            $polling->save(false);
            return true;
        }

        return $message->getErrors();
    }

    public function actionPolling()
    {

    }
}