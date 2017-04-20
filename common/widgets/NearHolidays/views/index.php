<?php foreach ($cats as $date){ ?>
    <?= \kartik\helpers\Html::a($date->title, ['site/list', 'category_id' => $date->id], ['title' => $date->date]) ?>
<?php } ?>

