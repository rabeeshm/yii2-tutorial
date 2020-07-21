<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' => '>Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = '>'.$this->title;
?>
<div class="product-create">

    <h1><?= Html::encode($this->title) ?></h1>
<?php

//print_r($model); exit;
?>
    <?= $this->render('_form', [
        'model' => $model,
       // 'categories' => $categories,
    ]) ?>

</div>
