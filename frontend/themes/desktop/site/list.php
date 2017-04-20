<?php
use kartik\dialog\Dialog;
use justinvoelker\separatedpager\LinkPager;

?>

<?php
    if(is_null($category_name)){
        $this->title = "Привітання, побажання та поздоровлення";
    }else{
        $this->title = $category_name;
    }
?>

<?php if(count($models) === 0){ ?>
    <div class="alert alert-danger text-center">
        В категорії "<?= $category_name ?>" побажань не знайдено!
    </div>
<?php }else{ ?>
    <?php foreach ($models as $model) { ?>
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
                <div class="text-center">
                    <?= $model->text ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-footer">
                <div class="container-fluid">
                    <div class="pull-left">
                        <button class="btn btn-default btn-sm copy-to-clipboard" data-clipboard-target="#gratter-<?=$model->id?>">Копіювати</button>
                    </div>
                    <div class="pull-right">
                        <div class="pluso"
                             data-background="#ebebeb"
                             data-options="small,square,line,horizontal,counter,theme=01"
                             data-title="Привітання до свята: <?= $category_name ?> "
                             data-url="<?= \yii\helpers\Url::toRoute(['site/list', 'great_num' => $model->id], true) ?>"
                             data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,livejournal">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>

<div class="text-center">
    <?= LinkPager::widget([
        'pagination' => $pages,
    ]); ?>
</div>
