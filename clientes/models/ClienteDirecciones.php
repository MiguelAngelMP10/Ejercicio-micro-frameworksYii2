<?php

namespace micro\models;

use Yii;

/**
 * This is the model class for table "cliente_direcciones".
 *
 * @property int $idCliente_direccciones
 * @property int $idCliente
 * @property string|null $calle
 * @property string|null $numero
 * @property string|null $municipio
 * @property string|null $estado
 * @property string|null $codigoPostal
 *
 * @property Clientes $idCliente0
 */
class ClienteDirecciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente_direcciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCliente'], 'required'],
            [['idCliente'], 'integer'],
            [['calle', 'numero', 'municipio', 'estado', 'codigoPostal'], 'string', 'max' => 45],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['idCliente' => 'idCliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCliente_direccciones' => 'Id Cliente Direccciones',
            'idCliente' => 'Id Cliente',
            'calle' => 'Calle',
            'numero' => 'Numero',
            'municipio' => 'Municipio',
            'estado' => 'Estado',
            'codigoPostal' => 'Codigo Postal',
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