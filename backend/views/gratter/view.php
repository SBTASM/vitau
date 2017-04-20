<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Gratter */

$this->title = "Просмотр";
$this->params['breadcrumbs'][] = ['label' => 'Поздравления', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Поздравления №" . $model->id;

$category = \common\models\Category::find()->where(['id' => $model->category_id])->one();
?>
<div class="gratter-view">



    <div class="panel panel-default">
        <div class="panel-body">
            <?= DetailView::widget([
                'model'=>$model,
                'options' => [
                    'enableEditMode' => false,
                ],
                'panel'=>[
                    'heading'=> "Поздравления №" . $model->id,
                    'type'=>DetailView::TYPE_DEFAULT,
                ],
                'attributes'=>[
                    [
                        'value' => \kartik\helpers\Html::a($category->title, ['category/view', 'id' => $category->id], []),
                        'label'=> 'Категория',
                        'format'=>'html', // Возможные варианты: raw, html
                    ],
                    'text:html',
                    'created_at',
                    'updated_at',
                ],
                'enableEditMode'=>false,

            ]);
            ?>
        </div>
        <div class="panel-footer">
            <div class="text-center">
                <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Ви действительно хотите удалить данное поздравления?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </div>



</div>
