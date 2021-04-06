<?php

namespace micro\models;

use Yii;

/**
 * This is the model class for table "cliente_telefonos".
 *
 * @property int $idCliente_Telefonos
 * @property int $idCliente
 * @property string|null $telefono
 *
 * @property Clientes $idCliente0
 */
class ClienteTelefonos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente_telefonos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCliente'], 'required'],
            [['idCliente'], 'integer'],
            [['telefono'], 'string', 'max' => 45],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['idCliente' => 'idCliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCliente_Telefonos' => 'Id Cliente Telefonos',
            'idCliente' => 'Id Cliente',
            'telefono' => 'Telefono',
        ];
    }

    /**
     * Gets query for [[IdCliente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
    {
        return $this->hasOne(Clientes::className(), ['idCliente' => 'idCliente']);
    }
}