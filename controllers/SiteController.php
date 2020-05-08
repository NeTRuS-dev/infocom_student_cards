<?php

namespace app\controllers;

use app\models\Student;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],

        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Student();
        $data = Yii::$app->request->post();
        if ($model->load($data) && $model->Save()) {

            return $this->render('success');
        } else {
            return $this->render('index', compact('model'));

        }
    }

}
