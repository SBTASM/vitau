<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поздравления';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php Pjax::begin(); ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'layout'=>"{items}<center>{pager}</center>",
                'columns' => [
                    'id',
//                    'text:html',
                    [
                        'attribute' => 'text',
                        'label'=> 'Текст',
                        'format' => 'html', // Возможные варианты: raw, html
                        'content' => function($data){ return trim(mb_substr($data->text, 0, 64) . "..."); }
                    ],
                    [
                        'attribute' => 'category_id',
                        'label'=> 'Категория',
                        'format'=>'html', // Возможные варианты: raw, html
                        'content' => function($data){
                            $category = $data->getCategory()->one();
                            return \kartik\helpers\Html::a($category->title, ['category/view', 'id' => $category->id], []);
                        }
                    ],

                    'created_at:text',
                    'updated_at:text',

                    ['class' => \kartik\grid\ActionColumn::className()],
                ],
                'pager' => [
                    'class' => 'justinvoelker\separatedpager\LinkPager',
                ]
            ]); ?>
        </div>
    </div>
<?php Pjax::end(); ?></div>
