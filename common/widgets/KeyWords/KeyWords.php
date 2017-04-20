<?php

namespace common\widgets\KeyWords;

use kartik\widgets\Widget;

/**
 * Class KeyWords
 * @package common\widgets\KeyWords
 */


class KeyWords extends Widget{
    public $category;
    protected $keywords;

    public function init()
    {
        $words = \common\models\Keywords::find()->where(['owner_id' => $this->category->id])->all();

        foreach ($words as $word){
            $this->keywords[] = $word->getKeyword()->one();
        }
    }

    public function run()
    {
        return $this->render('index', ['keywords' => $this->keywords, 'cat_id' => $this->category->id]);
    }
}