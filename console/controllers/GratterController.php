<?php

namespace console\controllers;

use common\models\Category;
use common\models\Gratter;
use yii\console\Controller;

class GratterController extends Controller{

    public function actionDelete($id){
        $gratter = Gratter::find()->where(['id' => $id])->one();

        return $gratter->delete();
    }

    function actionTestGratters(){
        $categories = Category::find()->all();
        foreach ($categories as $category){
            echo "Category ID = " . $category->id . " - " . $category->getGratters()->count() . "!\n";
            if($category->getGratters()->count() == 0){
                $category->delete();

                echo "Delete category. ID = " . $category->id . "\n";
            }
        }
    }

    public function actionClear($len = 32){
        $gratters = Gratter::find()->all();

        foreach($gratters as $gratter){
            if(mb_strlen($gratter->text) < $len){
                echo "Gratter deleting? ID = " . $gratter->id . ".\n";
                $gratter->delete();
            }
        }
    }
}