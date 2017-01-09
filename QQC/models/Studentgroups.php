<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "studentgroups".
 *
 * @property string $name
 *
 * @property Students[] $students
 */
class Studentgroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'studentgroups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['idStudentGroup' => 'name']);
    }
}
