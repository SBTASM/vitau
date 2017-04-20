<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Request */

$this->title = 'Запрос №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Запросы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$category = \common\models\Category::find()->where(['id' => $model->category_id])->one();

?>
<div class="request-view">

    <div class="panel panel-default">
        <div class="panel-body">
            <?= DetailView::widget([
                //'layout' => '{items}{pager}',
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'value' => \kartik\helpers\Html::a($category->title, ['category/view', 'id' => $category->id], []),
                        'label'=> 'Категория',
                        'format'=>'html', // Возможные варианты: raw, html
                    ],
                    'text:html',
                    'username',
                    'email:email',
                    'note:html',
                    'viewed:boolean',
                ],
            ]) ?>
        </div>
        <div class="panel-footer">
            <div class="text-center">
                <?= Html::a('Опубликовать', ['publicate', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['update', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
            </div>
        </div>
    </div>

</div>

