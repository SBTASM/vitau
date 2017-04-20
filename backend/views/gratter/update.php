<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Gratter */

$this->title = 'Редактировать поздравления';
$this->params['breadcrumbs'][] = ['label' => 'Поздравления', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gratter-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
