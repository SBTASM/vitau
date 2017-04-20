<script type="text/javascript">(function() {
        if (window.pluso)if (typeof window.pluso.start == "function") return;
        if (window.ifpluso==undefined) { window.ifpluso = 1;
            var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
            s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
            s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
            var h=d[g]('body')[0];
            h.appendChild(s);
        }})();
</script>
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
                     data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,print,livejournal"></div>
            </div>
            <button class="btn btn-default btn-sm copy-to-clipboard" data-clipboard-target="#gratter-<?=$model->id?>">Копіювати</button>
        </div>
    </div>
</div>