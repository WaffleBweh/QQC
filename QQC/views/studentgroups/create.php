<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Studentgroups */

$this->title = 'Create Studentgroups';
$this->params['breadcrumbs'][] = ['label' => 'Studentgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studentgroups-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
