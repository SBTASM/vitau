<?php

use kartik\widgets\DepDrop;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Request */
/* @var $form yii\widgets\ActiveForm */

$all_category = \yii\helpers\ArrayHelper::map(\common\models\Category::find()->all(), 'id', 'title');
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-4">
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
                    <div class="col-sm-4">
                        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-2">
                        <?= $form->field($model, 'viewed')->widget(\kartik\checkbox\CheckboxX::className(), [
                            'autoLabel'=>true,
                            'pluginOptions'=>['threeState'=>false]
                        ])->label(false) ?>
                    </div>
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

        <div class="panel-footer">
                <div class="text-center">
                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                        <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger']) ?>
                    </div>
                </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
