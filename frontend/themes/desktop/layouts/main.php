<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\NearHolidays\NearHolidays;
use yii\helpers\Html;
use frontend\assets\AppAsset;

use kartik\icons\Icon;

$categories = \common\models\Category::find()->all();

AppAsset::register($this);
Icon::map($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(is_null($this->title) ? 'Сервер привітань, побажань та поздоровлень!' : $this->title) ?></title>
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>

<div class="row">
    <div class="main-row">
        <div class="row">
            <div class="col-sm-12">
                <div class="wrap">
                    <div class="header">
                        <div class="fixed">
                            <div class="header-in">
                                <div class="logo"><a href="/" title="На головну сторінку українського сервера привітань"></a></div>
                                <div class="header_title">
                                    <h1>Привітання, побажання та поздоровлення</h1>
                                </div>
                            </div>
                            <div class="teaser_top"></div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="main">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2><?= !is_null($this->title) ? "Привітання до свята: $this->title" : "Вітаю Вас на сервері привітань, побажань та поздоровлень!" ?></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-3">
                                        <div class="left-block">Категорїї привітань</div>
                                        <div class="categories">
                                            <?php foreach ($categories as $category){
                                                echo Html::a($category->title, ['site/list', 'category_id' => $category->id]);
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <?= $content ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="right-block">Найближчі свята</div>
                                                <div class="categories-right">
                                                    <?= NearHolidays::widget(['categories' => \common\models\Category::find()->where(['is not', 'date', NULL])->all(), 'count' => 10]) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="footer">
                    <div class="fixed">
                        <div class="promo">

                        </div>

                        <div class="text-center">
                            <div class="copyright">
                                Ідея та втілення © <noindex><a href="mailto:perg@i.ua" title="Написати лист" rel="nofollow">Сеник Микола</a></noindex>, 2005-<?= date('Y') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
