<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schoolterms".
 *
 * @property string $id
 * @property string $start
 * @property string $end
 *
 * @property Lesson[] $lessons
 */
class Schoolterms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schoolterms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'start', 'end'], 'required'],
            [['start', 'end'], 'safe'],
            [['id'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start' => 'Start',
            'end' => 'End',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lesson::className(), ['idSchoolTerms' => 'id']);
    }
    
    public function getDisplayName()
    {
        return 'From ' . $this->start . ' to ' . $this->end;
    }
}
