<?php

namespace micro\controllers;

use micro\models\ProspectosDirecciones;
use yii\rest\ActiveController;
use Yii;

class ProspectosDireccionesController extends ActiveController
{
    public $modelClass = 'micro\models\ProspectosDirecciones';

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
        $idProspecto = $request->get('idProspecto');
        if ($idProspecto) {
            return Yii::createObject([
                'class' => 'yii\web\Response',
                'format' => \yii\web\Response::FORMAT_JSON,
                'data' => [
                    'message' => ['ok'],
                    'data' => [
                        'items' => ProspectosDirecciones::find()
                            ->where(['idProspecto' => $idProspecto])
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