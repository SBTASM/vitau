<?php

use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Запросы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

<?php Pjax::begin(); ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    'id',
                    [
                        'attribute' => 'category_id',
                        'label'=> 'Категория',
                        'format'=>'html', // Возможные варианты: raw, html
                        'content' => function($data){
                            $category = $data->getCategory()->one();
                            return \kartik\helpers\Html::a($category->title, ['category/view', 'id' => $category->id], []);
                        }
                    ],
//                    'text:ntext',

                    'username',
                    'email:email',
                    // 'note:ntext',
                    'viewed:boolean',

                    ['class' => \kartik\grid\ActionColumn::class],
                ],
                'pager' => [
                    'class' => 'justinvoelker\separatedpager\LinkPager',
                ]
            ]); ?>
        </div>
    </div>
<?php Pjax::end(); ?></div>
