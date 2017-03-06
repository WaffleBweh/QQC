<?php

namespace app\controllers;

use Yii;
use app\models\Students;
use app\models\StudentsSearch;
use yii\web\Controller;

class ShowDataController extends Controller {

    public function actionIndex()
    {
        $searchModel = new StudentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('showdata', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}