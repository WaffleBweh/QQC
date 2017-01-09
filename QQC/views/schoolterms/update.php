<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Schoolterms */

$this->title = 'Update Schoolterms: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Schoolterms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="schoolterms-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
