<?php

namespace micro\models;

use Yii;

/**
 * This is the model class for table "prospectos_direcciones".
 *
 * @property int $idPropectos_direccciones
 * @property int $idProspecto
 * @property string|null $calle
 * @property string|null $numero
 * @property string|null $municipio
 * @property string|null $estado
 * @property string|null $codigoPostal
 *
 * @property Prospectos $idProspecto0
 */
class ProspectosDirecciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prospectos_direcciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProspecto'], 'required'],
            [['idProspecto'], 'integer'],
            [['calle', 'numero', 'municipio', 'estado', 'codigoPostal'], 'string', 'max' => 45],
            [['idProspecto'], 'exist', 'skipOnError' => true, 'targetClass' => Prospectos::className(), 'targetAttribute' => ['idProspecto' => 'idProspecto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPropectos_direccciones' => 'Id Propectos Direccciones',
            'idProspecto' => 'Id Prospecto',
            'calle' => 'Calle',
            'numero' => 'Numero',
            'municipio' => 'Municipio',
            'estado' => 'Estado',
            'codigoPostal' => 'Codigo Postal',
        ];
    }

    /**
     * Gets query for [[IdProspecto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProspecto0()
    {
        return $this->hasOne(Prospectos::className(), ['idProspecto' => 'idProspecto']);
    }
}