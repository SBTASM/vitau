<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

<?php Pjax::begin(); ?>
    <div class="panel panel-default">
        <div class="panel-body panel-collapse">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => NULL,
                'layout'=>"{items}<center>{pager}</center>",
                'columns' => [
                    'id',
                    'title',
                    'date',

                    ['class' => \kartik\grid\ActionColumn::className()],
                ],
                'pager' => [
                    'class' => 'justinvoelker\separatedpager\LinkPager',
                ]
            ]); ?>
        </div>
    </div>
<?php Pjax::end(); ?></div>
