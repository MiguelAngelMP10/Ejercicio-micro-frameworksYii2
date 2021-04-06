<?php

namespace micro\controllers;

use micro\models\ClienteDirecciones;
use yii\rest\ActiveController;
use Yii;

class ClienteDireccionesController extends ActiveController
{
    public $modelClass = 'micro\models\ClienteDirecciones';

    public function behaviors()
    {
        // remove rateLimiter which requires an authenticated user to work
        $behaviors = parent::behaviors();
        unset($behaviors['rateLimiter']);
        return $behaviors;
    }

    public function actionDirecciones()
    {
        $request = Yii::$app->request;
        $idCliente = $request->get('idCliente');
        if ($idCliente) {
            return Yii::createObject([
                'class' => 'yii\web\Response',
                'format' => \yii\web\Response::FORMAT_JSON,
                'data' => [
                    'message' => ['ok'],
                    'data' => [
                        'items' => ClienteDirecciones::find()
                            ->where(['idCliente' => $idCliente])
                            ->all()
                    ],
                    'code' => 200,
                ],
            ]);
        } else {
            throw new \yii\web\HttpException(400, "El idCliente es requerido");
        }
    }
}