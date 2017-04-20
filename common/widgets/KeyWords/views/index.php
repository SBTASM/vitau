<?php if(!is_null($keywords)){ ?>
    <?php foreach ($keywords as $keyword){ ?>
        <?= \kartik\helpers\Html::a($keyword->word, ['site/list', 'category_id' => $cat_id, 'key' => $keyword->id]) ?>
    <?php } ?>
<?php } ?>