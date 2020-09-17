<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div>
   <div class="CheckoutSummary_CheckoutSummary__m4CC3">
      <div class="CheckoutSummary_BurgerContainer__xBHuV">
         <div class="Burger_Burger__1bt4S">
            <div class="BurgerIngredients_BreadTop__1Tgt_">
               <div class="BurgerIngredients_Seeds1__3gHSL"></div>
               <div class="BurgerIngredients_Seeds2__1QdVy"></div>
            </div>
            <?php 
               $session = Yii::$app->session->get('saladCount');
               $saladCount = Yii::$app->session->get('saladCount');
               $cheeseCount = Yii::$app->session->get('cheeseCount');
               $meatCount = Yii::$app->session->get('meatCount');
               $baconCount = Yii::$app->session->get('baconCount');
               for($i=1; $i <= $saladCount; $i++) {
                  echo "<div class='BurgerIngredients_Salad__3uNBq'></div>";
               }
               for($i=1; $i <= $cheeseCount; $i++) {
                  echo "<div class='BurgerIngredients_Cheese__1RsP3'></div>";
               }
               for($i=1; $i <= $baconCount; $i++) {
                  echo " <div class='BurgerIngredients_Bacon__1Nvb9'></div>";
               }
               for($i=1; $i <= $meatCount; $i++) {
                  echo " <div class='BurgerIngredients_Meat__3rI9h'></div>";
               }
              
            ?>
            <div class="BurgerIngredients_BreadBottom__3qx0s"></div>
         </div>
         <!-- <button class="Button_Button__2_yUN Button_Danger__22cxd">CANCEL</button> -->
         <?php 
            echo Html::a('CANCEL', ['/burger/cancel'], ['class'=>'Button_Button__2_yUN Button_Danger__22cxd']); 
            //echo Html::a('CONTINUE', ['/order/create'], ['class'=>'Button_Button__2_yUN Button_Success__1YUK9 continue']); 
         ?>
         <button class="Button_Button__2_yUN Button_Success__1YUK9 continue">CONTINUE</button>
      </div>
   </div>
</div>
<div class="ContactData hideform">
      <h4>Enter your Contact Details</h4>

      <?php
      $form = ActiveForm::begin([
         'action' => ['/order/create'],
         'method' => 'post'
      ]) 
     // $form = ActiveForm::begin(['action' =>['forum-post/create'], 'id' => 'forum_post', 'method' => 'post',]);
      ?>
      <div class="Input_Input">
         <?= $form->field($model, 'name')->textInput(['maxlength' => true])->input('', ['placeholder' => "Your Name"])->label(false); ?>
      </div>
      <div class="Input_Input">
         <?= $form->field($model, 'street')->textInput(['maxlength' => true])->input('', ['placeholder' => "Street"])->label(false); ?>
      </div>
      <div class="Input_Input">
         <?= $form->field($model, 'city')->textInput(['maxlength' => true])->input('', ['placeholder' => "City"])->label(false); ?>
      </div>
      <div class="Input_Input">
         <?= $form->field($model, 'zip')->textInput(['type' => 'number','maxlength' => true])->input('', ['placeholder' => "ZIP Code"])->label(false); ?>
      </div>
      <div class="Input_Input">
         <?= $form->field($model, 'country')->textInput(['maxlength' => true])->input('', ['placeholder' => "Country"])->label(false); ?>
      </div>
      <div class="Input_Input">
         <?= $form->field($model, 'state')->textInput(['maxlength' => true])->input('', ['placeholder' => "State"])->label(false); ?>
      </div>
      <div class="Input_Input">
         <?php $options= ['0' => 'Fastest', '1' => 'Cheapest'];?>
         <?= $form->field($model, 'delivery_type')->dropDownList($options,['prompt'=>'Select Delivery Mode'])->label(false); ?>
      </div>

      <?= Html::submitButton('Order', ['class' => '']) ?>
      <?php ActiveForm::end() ?>
   </div>