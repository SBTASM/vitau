<?php

/**
 * @var $this yii\web\View
 * @var $last_gratters \common\models\Gratter
 * @var $last_request \common\models\Request
 */

$this->title = 'Главная';

/**
 * @var \common\models\Gratter[] $last_gratters
 */
?>
<div class="site-index">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?= $category_count ?></h3>

                                    <p>Категорий</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <?= \kartik\helpers\Html::a("Посмотреть <i class=\"fa fa-arrow-circle-right\"></i>", ['category/index'], ['class' => 'small-box-footer']) ?>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?= $gratter_count ?></sup></h3>

                                    <p>Поздравлений</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <?= \kartik\helpers\Html::a("Посмотреть <i class=\"fa fa-arrow-circle-right\"></i>", ['gratter/index'], ['class' => 'small-box-footer']) ?>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?= $question_count ?></h3>

                                    <p>Предложений</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <?= \kartik\helpers\Html::a("Посмотреть <i class=\"fa fa-arrow-circle-right\"></i>", ['request/index'], ['class' => 'small-box-footer']) ?>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
