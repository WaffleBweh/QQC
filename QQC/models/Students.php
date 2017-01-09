<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $phone
 * @property string $email
 * @property string $idStudentGroup
 *
 * @property Follow[] $follows
 * @property Lesson[] $idLessons
 * @property Studentgroups $idStudentGroup0
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'idStudentGroup'], 'required'],
            [['name', 'surname', 'email'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 30],
            [['idStudentGroup'], 'string', 'max' => 20],
            [['idStudentGroup'], 'exist', 'skipOnError' => true, 'targetClass' => Studentgroups::className(), 'targetAttribute' => ['idStudentGroup' => 'name']],
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
            'phone' => 'Phone',
            'email' => 'Email',
            'idStudentGroup' => 'Id Student Group',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFollows()
    {
        return $this->hasMany(Follow::className(), ['idStudent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLessons()
    {
        return $this->hasMany(Lesson::className(), ['nickname' => 'idLesson'])->viaTable('follow', ['idStudent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudentGroup0()
    {
        return $this->hasOne(Studentgroups::className(), ['name' => 'idStudentGroup']);
    }
}
