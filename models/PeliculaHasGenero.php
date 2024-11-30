<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelicula_has_genero".
 *
 * @property int $fk_idpelicula
 * @property int $fk_idcategoria
 */
class PeliculaHasGenero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelicula_has_genero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_idpelicula', 'fk_idcategoria'], 'required'],
            [['fk_idpelicula', 'fk_idcategoria'], 'integer'],
            [['fk_idpelicula', 'fk_idcategoria'], 'unique', 'targetAttribute' => ['fk_idpelicula', 'fk_idcategoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fk_idpelicula' => Yii::t('app', 'Fk Idpelicula'),
            'fk_idcategoria' => Yii::t('app', 'Fk Idcategoria'),
        ];
    }
}
