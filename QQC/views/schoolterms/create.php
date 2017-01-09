<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Schoolterms */

$this->title = 'Create Schoolterms';
$this->params['breadcrumbs'][] = ['label' => 'Schoolterms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schoolterms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
