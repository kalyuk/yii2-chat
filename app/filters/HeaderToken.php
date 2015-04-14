<?php


namespace app\filters;



use yii\filters\auth\QueryParamAuth;

class HeaderToken extends QueryParamAuth
{
    public function authenticate($user, $request, $response)
    {
        $accessToken = $request->getHeaders()[$this->tokenParam];
        if (is_string($accessToken)) {
            $identity = $user->loginByAccessToken($accessToken, get_class($this));
            if ($identity !== null) {
                return $identity;
            }
        }
        if ($accessToken !== null) {
            $this->handleFailure($response);
        }

        return null;
    }
}