<?php

namespace micro\models;

use Yii;

/**
 * This is the model class for table "prospectos_telefonos".
 *
 * @property int $idProspecto_Telefonos
 * @property int $idPospecto
 * @property string|null $telefono
 *
 * @property Prospectos $idPospecto0
 */
class ProspectosTelefonos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prospectos_telefonos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPospecto'], 'required'],
            [['idPospecto'], 'integer'],
            [['telefono'], 'string', 'max' => 45],
            [['idPospecto'], 'exist', 'skipOnError' => true, 'targetClass' => Prospectos::className(), 'targetAttribute' => ['idPospecto' => 'idProspecto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProspecto_Telefonos' => 'Id Prospecto Telefonos',
            'idPospecto' => 'Id Pospecto',
            'telefono' => 'Telefono',
        ];
    }

    /**
     * Gets query for [[IdPospecto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdPospecto0()
    {
        return $this->hasOne(Prospectos::className(), ['idProspecto' => 'idPospecto']);
    }
}