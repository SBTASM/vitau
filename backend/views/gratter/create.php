<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Gratter */

$this->title = 'Новое поздравления';
$this->params['breadcrumbs'][] = ['label' => 'Поздравления', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gratter-create">

   <div class="panel panel-default">
       <div class="panel-body">
           <?= $this->render('_form', [
               'model' => $model,
           ]) ?>
       </div>
   </div>

</div>
