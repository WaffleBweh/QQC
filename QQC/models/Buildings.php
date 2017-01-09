<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buildings".
 *
 * @property string $name
 * @property string $address
 *
 * @property Classrooms[] $classrooms
 */
class Buildings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buildings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'required'],
            [['name'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassrooms()
    {
        return $this->hasMany(Classrooms::className(), ['idBuilding' => 'name']);
    }
}
