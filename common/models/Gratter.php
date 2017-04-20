<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gratter".
 *
 * @property integer $id
 * @property string $text
 * @property integer $category_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Category $category
 */
class Gratter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gratter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'created_at', 'updated_at'], 'required'],
            [['text', 'updated_at', 'created_at'], 'string'],
            [['category_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ид',
            'text' => 'Текс поздравления',
            'category_id' => 'Категория',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @inheritdoc
     * @return GratterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GratterQuery(get_called_class());
    }
}
