<div class="alert <?= $complate ? 'alert-success' : 'alert-error' ?> text-center">
    <?php  if($complete){ ?>
        Ваше поздоровлення відправленно на модерацію<br>
        <?= \kartik\helpers\Html::a('Перейти на головну', ['site/index'], []) ?>
    <?php }else{ ?>
        Виникла помилка
    <?php } ?>
</div>