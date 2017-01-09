<?php

namespace app\models;

use yii\base\Model;

class TestForm extends Model
{
	public $name;
	public $surname;
	public $phone;
	public $email;

	public function rules()
	{
		return [
		[['name','surname','phone','email'], 'required'],
		['email','email'],
		['phone','phone']
		];
	}
} 
