<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelicula_has_actor".
 *
 * @property int $fk_idpelicula
 * @property int $fk_idactor
 */
class ActorHasPelicula extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actor_has_pelicula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_idpelicula', 'fk_idactor'], 'required'],
            [['fk_idpelicula', 'fk_idactor'], 'integer'],
            [['fk_idpelicula', 'fk_idactor'], 'unique', 'targetAttribute' => ['fk_idpelicula', 'fk_idactor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fk_idpelicula' => Yii::t('app', 'Fk Idpelicula'),
            'fk_idactor' => Yii::t('app', 'Fk Idactor'),
        ];
    }
}
