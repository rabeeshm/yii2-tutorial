<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Button;
use yii\helpers\Url;
?>

   <div class="Modal_Modal__2-MHQ" style="transform: translateY(-100vh); opacity: 0;"></div>
   <div class="Modal_Modal__2-MHQ" style="transform: translateY(-100vh); opacity: 0;">
      <h3>Your Order</h3>
      <p>A delicious burger with following ingredients :</p>
      <ul>
         <li><span style="text-transform: capitalize;">salad1</span> : 0 </li>
         <li><span style="text-transform: capitalize;">bacon</span> : 0 </li>
         <li><span style="text-transform: capitalize;">cheese</span> : 0 </li>
         <li><span style="text-transform: capitalize;">meat</span> : 0 </li>
      </ul>
      <p><strong>Total Price : 4.00</strong></p>
      <p>Continue to Checkout?</p>
      <button class="Button_Button__2_yUN Button_Danger__22cxd">CANCEL</button><button class="Button_Button__2_yUN Button_Success__1YUK9">CONTINUE</button>
   </div>
   <div class="Burger_Burger__1bt4S">
      <div class="BurgerIngredients_BreadTop__1Tgt_">
         <div class="BurgerIngredients_Seeds1__3gHSL"></div>
         <div class="BurgerIngredients_Seeds2__1QdVy"></div>
      </div>
      <p class="message">Please start adding ingredients !!!.</p>
      <div class="BurgerIngredients_BreadBottom__3qx0s"></div>
   </div>
   <div class="BuildControls_BuildControls__h_mQt">
      <p>Current Price : <strong><span class="totalPrice">4.00</span></strong></p>
      <div class="BuildControl_BuildControl__1PzSL">
         <div class="BuildControl_Label__2ea1p">Salad</div>
         <button class="BuildControl_Less__3KFta remove-salad" disabled>Less</button><button class="BuildControl_More__3u6ga add-salad">More</button>
      </div>
      <div class="BuildControl_BuildControl__1PzSL">
         <div class="BuildControl_Label__2ea1p">Cheese</div>
         <button class="BuildControl_Less__3KFta remove-cheese" disabled>Less</button><button class="BuildControl_More__3u6ga add-cheese">More</button>
      </div>
      <div class="BuildControl_BuildControl__1PzSL">
         <div class="BuildControl_Label__2ea1p">Bacon</div>
         <button class="BuildControl_Less__3KFta remove-bacon" disabled>Less</button><button class="BuildControl_More__3u6ga add-bacon">More</button>
      </div>
      <div class="BuildControl_BuildControl__1PzSL">
         <div class="BuildControl_Label__2ea1p">Meat</div>
         <button class="BuildControl_Less__3KFta remove-meat" disabled>Less</button><button class="BuildControl_More__3u6ga add-meat">More</button>
      </div>
      <?php 
         if (Yii::$app->user->isGuest) {
            echo Html::a('SIGN UP FOR ORDER', ['/site/login'], ['class'=>'BuildControls_OrderButton__1eKNn', 'disabled'=>'disabled']); 
         } else {
            echo Html::button('SIGN UP FOR ORDER', [ 'title' => 'Creating New Company', 'class' => 'BuildControls_OrderButton__1eKNn showModalButton ', 'disabled'=>true]); 
         }
      ?>
      <!-- <button class="BuildControls_OrderButton__1eKNn" disabled> SIGN UP FOR ORDER</button> -->
   </div>

