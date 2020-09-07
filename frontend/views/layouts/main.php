<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\bootstrap4\Modal;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
   <head>
      <meta charset="<?= Yii::$app->charset ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php $this->registerCsrfMetaTags() ?>
      <title><?= Html::encode($this->title) ?></title>
      <?php $this->head() ?>
   </head>
   <body>
      <?php $this->beginBody() ?>

      <div class="root">
         <?php
            echo $this->render('_header');
         ?>
         <div class="main">
         <?php echo  $content ?>
         </div>
      </div>
   <?php $this->endBody() ?>
   </body>
</html>
<?php
   yii\bootstrap4\Modal::begin([
      'headerOptions' => ['id' => 'modalHeader'],
      'id' => 'modal',
      'size' => 'modal-lg',
      //keeps from closing modal with esc key or by clicking out of the modal.
      // user must click cancel or X to close
      'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
   ]);
      echo '<div id="modalContent">
      <h3>Your Order</h3>
      <p>A delicious burger with following ingredients :</p>
      <ul>
         <li><span style="text-transform: capitalize;">salad</span> : <span class="saladCount"></span></li>
         <li><span style="text-transform: capitalize;">bacon</span> : <span class="baconCount"></span </li>
         <li><span style="text-transform: capitalize;">cheese</span> : <span class="cheeseCount"></span </li>
         <li><span style="text-transform: capitalize;">meat</span> : <span class="meatCount"></span </li>
      </ul>
      <p><strong>Total Price : <span class="total"></span></strong></p>
      <p>Continue to Checkout?</p>
      <button class="Button_Button__2_yUN Button_Danger__22cxd close">CANCEL</button><button class="Button_Button__2_yUN Button_Success__1YUK9 checkout">CONTINUE</button>
      </div>';
   yii\bootstrap4\Modal::end();
?>
<?php $this->endPage() ?>
