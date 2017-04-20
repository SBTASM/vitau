<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "keywords".
 *
 * @property integer $id
 * @property integer $owner_id
 * @property integer $keyword_id
 * @property integer $gratter_id
 *
 * @property Gratter $gratter
 * @property Keyword $keyword
 * @property Category $owner
 */
class Keywords extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'keywords';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_id', 'keyword_id', 'gratter_id'], 'required'],
            [['owner_id', 'keyword_id', 'gratter_id'], 'integer'],
            [['gratter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gratter::className(), 'targetAttribute' => ['gratter_id' => 'id']],
            [['keyword_id'], 'exist', 'skipOnError' => true, 'targetClass' => Keyword::className(), 'targetAttribute' => ['keyword_id' => 'id']],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['owner_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'owner_id' => 'Owner ID',
            'keyword_id' => 'Keyword ID',
            'gratter_id' => 'Gratter ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGratter()
    {
        return $this->hasOne(Gratter::className(), ['id' => 'gratter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeyword()
    {
        return $this->hasOne(Keyword::className(), ['id' => 'keyword_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Category::className(), ['id' => 'owner_id']);
    }
}
