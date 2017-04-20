<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <div class="panel panel-default">
        <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'title',
                    [
                        'value' => $count,
                        'label'=> 'Поздравлений в категории',
                        'format'=>'text', // Возможные варианты: raw, html
                    ],
                    [
                        'value' => \kartik\helpers\Html::a("просмотреть", ['gratter/index', 'cat_id' => $model->id], []),
                        'label'=> 'Поздравления категории',
                        'format' => 'html', // Возможные варианты: raw, html
                    ],
                    'date'
                ],
            ]) ?>
        </div>
        <div class="panel-footer">
            <div class="text-center">
                <p>
                    <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Ви действительно хотите удалить данную категорию?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
            </div>
        </div>
    </div>

</div>
