<?php

namespace frontend\controllers;

class BurgerController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
