<?php

namespace frontend\controllers;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use common\models\Orders;
use yii\data\ActiveDataProvider;
use common\models\UserDetails;

class OrderController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $orders = Orders::findAll(['user_id'=>Yii::$app->user->id]);
        return $this->render('index', ['orders' =>  $orders]);
    }
    public function actionCreate()
    {
        $userDetailsModel = new UserDetails();
        if(isset($_POST['UserDetails']))
        {
            $userDetails = $_POST['UserDetails'];
            $userDetailsModel->name=$userDetails['name'];
            $userDetailsModel->user_id=Yii::$app->user->id;
            $userDetailsModel->street=$userDetails['street'];
            $userDetailsModel->city=$userDetails['city'];
            $userDetailsModel->zip=$userDetails['zip'];
            $userDetailsModel->state=$userDetails['state'];
            $userDetailsModel->country=$userDetails['country'];
            $userDetailsModel->delivery_type=$userDetails['delivery_type'];
            $userDetailsModel->created_by=Yii::$app->user->id;
            $userDetailsModel->created_at = time();
            if($userDetailsModel->save()) {
                $this->saveOrderDetails();
            } 
        }
    }
    public function saveOrderDetails() {
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
