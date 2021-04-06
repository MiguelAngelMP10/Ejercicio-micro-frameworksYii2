<?php

namespace micro\controllers;

use yii\rest\ActiveController;

class ProspectosController extends ActiveController
{
    public $modelClass = 'micro\models\Prospectos';

    public function behaviors()
    {
        // remove rateLimiter which requires an authenticated user to work
        $behaviors = parent::behaviors();
        unset($behaviors['rateLimiter']);
        return $behaviors;
    }
}