<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property string $nickname
 * @property string $fullname
 * @property string $idSchoolTerms
 *
 * @property Deroule[] $deroules
 * @property Classrooms[] $idClassrooms
 * @property Follow[] $follows
 * @property Students[] $idStudents
 * @property Give[] $gives
 * @property Teachers[] $idTeachers
 * @property Schoolterms $idSchoolTerms0
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nickname', 'fullname', 'idSchoolTerms'], 'required'],
            [['nickname'], 'string', 'max' => 10],
            [['fullname'], 'string', 'max' => 50],
            [['idSchoolTerms'], 'string', 'max' => 40],
            [['idSchoolTerms'], 'exist', 'skipOnError' => true, 'targetClass' => Schoolterms::className(), 'targetAttribute' => ['idSchoolTerms' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nickname' => 'Nickname',
            'fullname' => 'Fullname',
            'idSchoolTerms' => 'Id School Terms',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeroules()
    {
        return $this->hasMany(Deroule::className(), ['idLesson' => 'nickname']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClassrooms()
    {
        return $this->hasMany(Classrooms::className(), ['name' => 'idClassroom'])->viaTable('deroule', ['idLesson' => 'nickname']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFollows()
    {
        return $this->hasMany(Follow::className(), ['idLesson' => 'nickname']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudents()
    {
        return $this->hasMany(Students::className(), ['id' => 'idStudent'])->viaTable('follow', ['idLesson' => 'nickname']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGives()
    {
        return $this->hasMany(Give::className(), ['idLesson' => 'nickname']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTeachers()
    {
        return $this->hasMany(Teachers::className(), ['id' => 'idTeacher'])->viaTable('give', ['idLesson' => 'nickname']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSchoolTerms0()
    {
        return $this->hasOne(Schoolterms::className(), ['id' => 'idSchoolTerms']);
    }
}
