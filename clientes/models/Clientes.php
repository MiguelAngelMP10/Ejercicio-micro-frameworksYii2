<?php

namespace micro\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $idCliente
 * @property string|null $nombres
 * @property string|null $apellidos
 *
 * @property ClienteDirecciones[] $clienteDirecciones
 * @property ClienteTelefonos[] $clienteTelefonos
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombres', 'apellidos'], 'string', 'max' => 155],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCliente' => 'Id Cliente',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
        ];
    }

    /**
     * Gets query for [[ClienteDirecciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClienteDirecciones()
    {
        return $this->hasMany(ClienteDirecciones::className(), ['idCliente' => 'idCliente']);
    }

    /**
     * Gets query for [[ClienteTelefonos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClienteTelefonos()
    {
        return $this->hasMany(ClienteTelefonos::className(), ['idCliente' => 'idCliente']);
    }

    public function extraFields()
    {
        return ['clienteTelefonos', 'clienteDirecciones',];
    }
}