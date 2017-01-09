<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $nickname
 * @property string $phone
 * @property string $email
 *
 * @property Give[] $gives
 * @property Lesson[] $idLessons
 */
class Teachers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'nickname', 'phone', 'email'], 'required'],
            [['name', 'surname', 'email'], 'string', 'max' => 50],
            [['nickname'], 'string', 'max' => 4],
            [['phone'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'nickname' => 'Nickname',
            'phone' => 'Phone',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGives()
    {
        return $this->hasMany(Give::className(), ['idTeacher' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLessons()
    {
        return $this->hasMany(Lesson::className(), ['nickname' => 'idLesson'])->viaTable('give', ['idTeacher' => 'id']);
    }
}
