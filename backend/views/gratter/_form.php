<?php

use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Gratter */
/* @var $form yii\widgets\ActiveForm */

?>

<?php
    $all_category = \yii\helpers\ArrayHelper::map(\common\models\Category::find()->all(), 'id', 'title');
?>

<div class="container-fluid">

    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

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
                    <?= $form->field($model, 'created_at')->widget(\kartik\date\DatePicker::className(), []); ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'updated_at')->widget(\kartik\date\DatePicker::className(), []); ?>
                </div>
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
                <div class="col-sm-2 col-sm-push-5">
                    <div class="form-group col-sm-4">
                        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
