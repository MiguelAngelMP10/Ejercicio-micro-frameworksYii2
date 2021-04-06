<?php

namespace micro\models;

use Yii;

/**
 * This is the model class for table "prospectos".
 *
 * @property int $idProspecto
 * @property string|null $nombres
 * @property string|null $apellidos
 *
 * @property ProspectosDirecciones[] $prospectosDirecciones
 * @property ProspectosTelefonos[] $prospectosTelefonos
 */
class Prospectos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prospectos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombres'], 'string', 'max' => 155],
            [['apellidos'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProspecto' => 'Id Prospecto',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
        ];
    }

    /**
     * Gets query for [[ProspectosDirecciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProspectosDirecciones()
    {
        return $this->hasMany(ProspectosDirecciones::className(), ['idProspecto' => 'idProspecto']);
    }

    /**
     * Gets query for [[ProspectosTelefonos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProspectosTelefonos()
    {
        return $this->hasMany(ProspectosTelefonos::className(), ['idPospecto' => 'idProspecto']);
    }

    public function extraFields()
    {
        return ['prospectosDirecciones', 'prospectosTelefonos',];
    }
}