<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classrooms".
 *
 * @property string $name
 * @property string $idBuilding
 *
 * @property Buildings $idBuilding0
 * @property Deroule[] $deroules
 * @property Lesson[] $idLessons
 */
class Classrooms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classrooms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'idBuilding'], 'required'],
            [['name', 'idBuilding'], 'string', 'max' => 20],
            [['idBuilding'], 'exist', 'skipOnError' => true, 'targetClass' => Buildings::className(), 'targetAttribute' => ['idBuilding' => 'name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'idBuilding' => 'Id Building',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBuilding0()
    {
        return $this->hasOne(Buildings::className(), ['name' => 'idBuilding']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeroules()
    {
        return $this->hasMany(Deroule::className(), ['idClassroom' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLessons()
    {
        return $this->hasMany(Lesson::className(), ['nickname' => 'idLesson'])->viaTable('deroule', ['idClassroom' => 'name']);
    }
}
