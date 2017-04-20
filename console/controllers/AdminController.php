<?php

namespace console\controllers;

use common\models\User;
use yii\base\Exception;
use yii\console\Controller;

class AdminController extends Controller
{
    /**
     * Create new administrator.
     * @param $username
     * @param $email
     * @param $password
     */
    public function actionCreate($username, $email, $password){
        $new_admin = new User();
        $new_admin->email = $email;
        $new_admin->username = $username;
        $new_admin->setPassword($password);

        try{
            $new_admin->save();
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

}
