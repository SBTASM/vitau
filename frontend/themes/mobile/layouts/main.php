<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\MobileAsset;
use yii\helpers\Html;
use common\widgets\Alert;

MobileAsset::register($this);

$categories = \common\models\Category::find()->all();
foreach ($categories as $category){
    $menuItems[] = ['label' => $category->title, 'url' => ['/site/list', 'category_id' => $category->id]];
}
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">

        <ul id="header-menu">
            <?php
            foreach ($categories as $category){
                echo Html::a($category->title, ['site/list', 'category_id' => $category->id], ['class' => 'text-center']);
            }
            ?>
        </ul>

        <?= Alert::widget() ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="main-content">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-center">Сеник Микола&copy;  <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
