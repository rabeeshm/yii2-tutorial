<?php
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
?>
<div class="Layout_Content__3SAqO">
   <header class="Toolbar_Toolbar__2pTQV">
      <div class="DrawerToggle_DrawerToggle__2f_XQ">
         <div></div>
         <div></div>
         <div></div>
      </div>
      <div class="Toolbar_Logo__3fJu1">
         <div class="Logo_Logo__37zrV">
            <img src="/images/burger-logo.png" />
         </div>
    </div>
    <?php
        NavBar::begin([
            'options'=>['class'=>'navbar navbar-expand-lg navbar-light bg-light shadow-sm']
        ]);
        $menuItems = [
            ['label' => 'Burger Builder', 'url' => ['/burger/index']],
        ];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $menuItems[] = [
                'label'=>'Logout ('. Yii::$app->user->identity->username .')',
                'url'=>['/site/logout'],
            'linkOptions'=>[
                'data-method'=>'post'
            ]
            ];
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ml-auto'],
            'items' => $menuItems,
        ]);

        NavBar::end();
    ?>
   </header>
</div>
