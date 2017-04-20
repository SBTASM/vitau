<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $text
 * @property string $username
 * @property string $email
 * @property string $note
 * @property integer $viewed
 *
 * @property Category $category
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'text', 'username', 'email'], 'required'],
            [['category_id', 'viewed'], 'integer'],
            [['text', 'note'], 'string'],
            [['username', 'email'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ИД',
            'category_id' => 'Категорія',
            'text' => 'Текст',
            'username' => 'Ім\'я автора',
            'email' => 'е-мейл',
            'note' => 'Примітки',
            'viewed' => 'Переглянуто',
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
     * @return RequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestQuery(get_called_class());
    }
}
