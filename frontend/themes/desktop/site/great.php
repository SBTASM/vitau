<?php if(is_null($model)){ ?>
    <?php throw new \yii\web\NotFoundHttpException('Поздоровлення не знайдено!!!') ?>
<?php }else{ ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="container-fluid">
                <div class="pull-left">
                    №<?= $model->id ?>
                </div>
                <div class="pull-right">
                    <div class="pull-right"><?= $model->created_at ?></div>
                </div>
            </div>
        </div>
        <div class="panel-body gratter" id="gratter-<?=$model->id?>">
            <?= $model->text ?>
            <div class="clearfix"></div>
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="pull-right">
                    <div class="pluso"
                         data-background="#ebebeb"
                         data-options="small,square,line,horizontal,counter,theme=01"
                         data-title="Привітання до свята: <?= $category_name ?> "
                         data-url="<?= \yii\helpers\Url::toRoute(['site/list', 'great_num' => $model->id], true) ?>"
                         data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,livejournal"></div>
                </div>
                <button class="btn btn-default btn-sm copy-to-clipboard" data-clipboard-target="#gratter-<?=$model->id?>">Копіювати</button>
            </div>
        </div>
    </div>
<?php } ?>
