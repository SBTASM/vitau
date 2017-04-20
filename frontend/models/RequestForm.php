<?php
/**
 * Created by PhpStorm.
 * User: Machine
 * Date: 28.02.2017
 * Time: 9:30
 */

namespace frontend\models;



use common\models\Request;
use himiklab\yii2\recaptcha\ReCaptchaValidator;

class RequestForm extends Request
{
    public $reCaptcha;

    public function rules()
    {
        return array_merge(parent::rules(), [
            ['reCaptcha', ReCaptchaValidator::className()]
        ]);
    }
}