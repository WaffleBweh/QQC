<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Buildings;
use yii\helpers\ArrayHelper

/* @var $this yii\web\View */
/* @var $model app\models\Classrooms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="classrooms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'idBuilding')->dropDownList(ArrayHelper::map(Buildings::find()->select(['name'])->all(), 'name', 'name'), ['class' => 'form-control inline-block']); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
