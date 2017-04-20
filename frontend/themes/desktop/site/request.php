<?php

use kartik\depdrop\DepDrop;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Request */
/* @var $form ActiveForm */
?>
<?php $this->title = 'Додати своє поздоровлення' ?>
<?php $all_category = \yii\helpers\ArrayHelper::map(\common\models\Category::find()->all(), 'id', 'title'); ?>
<div class="request">

    <?php \yii\widgets\Pjax::begin() ?>
    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                    <?= $form->field($model, 'category_id')->widget(DepDrop::classname(), [
                        'data' => $all_category,
                        'type' => DepDrop::TYPE_SELECT2,
                        'select2Options' => ['pluginOptions'=>['allowClear' => true]],
                        'pluginOptions'=>[
                            'depends'=> $all_category,
                            'placeholder' => 'Виберете категорию....',
                            'url' => ['category']
                        ]
                    ]); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">

                    <div class="col-sm-6"><?= $form->field($model, 'username') ?></div>
                    <div class="col-sm-6"><?= $form->field($model, 'email') ?></div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <?= $form->field($model, 'text')->widget(\dosamigos\tinymce\TinyMce::className(), [
                        'options' => ['rows' => 6],
                        'language' => 'ru',
                        'clientOptions' => [
                            'plugins' => [
                                "advlist autolink lists link charmap print preview anchor",
                                "searchreplace visualblocks code",
                                "insertdatetime media table contextmenu paste"
                            ],
                            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                        ]
                    ]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <?= $form->field($model, 'note')->widget(\dosamigos\tinymce\TinyMce::className(), [
                        'options' => ['rows' => 6],
                        'language' => 'ru',
                        'clientOptions' => [
                            'plugins' => [
                                "advlist autolink lists link charmap print preview anchor",
                                "searchreplace visualblocks code",
                                "insertdatetime media table contextmenu paste"
                            ],
                            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                        ]
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-9">
                        <?= $form->field($model, 'reCaptcha')->widget(
                            \himiklab\yii2\recaptcha\ReCaptcha::className(),
                            ['widgetOptions' => ['class' => 'col-sm-offset-2']]
                        )->label(false) ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="panel-footer">
            <div class="form-group text-center">
                <?= Html::submitButton('Відправити', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <?php \yii\widgets\Pjax::end() ?>

</div><!-- request -->
