<?php

namespace frontend\controllers;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use common\models\Orders;
use yii\data\ActiveDataProvider;

class OrderController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionCreate()
    {
        $session = Yii::$app->session->get('saladCount');
        $saladCount = Yii::$app->session->get('saladCount');
        $cheeseCount = Yii::$app->session->get('cheeseCount');
        $meatCount = Yii::$app->session->get('meatCount');
        $baconCount = Yii::$app->session->get('baconCount');
        $total = Yii::$app->session->get('total');
        $orderDetails = json_encode([
            'ingredients'=>[
                'Salad'=>$saladCount,
                'Cheese'=>$cheeseCount,
                'Meat'=>$meatCount,
                'Bacon'=>$baconCount
            ],
            'total'=>$total
        ]);
        $orderObject = new Orders();
        $orderObject->user_id = Yii::$app->user->id;
        $orderObject->order_details = $orderDetails;
        $orderObject->total_price = $total;
        $orderObject->status = 1;
        $orderObject->created_by = Yii::$app->user->id;
        if($orderObject->save()) {
            $session = Yii::$app->session;
            $session->removeAll();
            $this->redirect('index');
        }
    }

}
