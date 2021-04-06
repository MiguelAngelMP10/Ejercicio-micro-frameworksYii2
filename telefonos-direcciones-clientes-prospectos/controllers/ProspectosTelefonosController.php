<?php

namespace micro\controllers;

use micro\models\ProspectosTelefonos;
use yii\rest\ActiveController;
use Yii;

class ProspectosTelefonosController extends ActiveController
{
    public $modelClass = 'micro\models\ProspectosTelefonos';

    public function behaviors()
    {
        // remove rateLimiter which requires an authenticated user to work
        $behaviors = parent::behaviors();
        unset($behaviors['rateLimiter']);
        return $behaviors;
    }

    public function actionTelefonos()
    {
        $request = Yii::$app->request;
        $idProspecto = $request->get('idProspecto');
        if ($idProspecto) {
            return Yii::createObject([
                'class' => 'yii\web\Response',
                'format' => \yii\web\Response::FORMAT_JSON,
                'data' => [
                    'message' => ['ok'],
                    'data' => [
                        'items' => ProspectosTelefonos::find()
                            ->where(['idPospecto' => $idProspecto])
                            ->all()
                    ],
                    'code' => 200,
                ],
            ]);
        } else {
            throw new \yii\web\HttpException(400, "El idProspecto es requerido");
        }
    }
}