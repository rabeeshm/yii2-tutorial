<?php

namespace frontend\controllers;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use common\models\UserDetails;

class BurgerController extends \yii\web\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['preview'],
                'rules' => [
                    [
                        'actions' => ['preview'],
                        'allow' => true,
                        'roles' => ['@','?'],
                    ],
                ]
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionCheckout()
    {
        $post = Yii:: $app->request->post();
        $session = Yii::$app->session;
        $session->set('saladCount', $post['saladCount'] ?? 0);
        $session->set('cheeseCount', $post['cheeseCount'] ?? 0);
        $session->set('meatCount', $post['meatCount'] ?? 0);
        $session->set('baconCount', $post['baconCount'] ?? 0);
        $session->set('total', $post['total'] ?? 0);
        $link = "/burger/preview";
        echo $link;exit;
    }
    public function actionPreview()
    {
        $model = new UserDetails();
        return $this->render('preview', ['model' =>  $model]);
    }
    public function actionCancel()
    {
        $session = Yii::$app->session;
        $session->removeAll();
        $this->redirect('index');
    }

}
