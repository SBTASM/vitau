<?php

namespace common\widgets\NearHolidays;

use common\models\Category;
use kartik\base\Widget;


/**
 * Class NearHolidays
 * @package common\widgets\NearHolidays
 *
 * @property Category[] $categories
 */
class NearHolidays extends Widget{

    public $categories;
    public $res_cats;
    public $count;

    public function init()
    {
        $cats = $this->categories;
        $current_time = time();
        usort($cats, function($cat1, $cat2) use($current_time){
            return ($this->getCatTime($cat1) > $this->getCatTime($cat2)) < $current_time ? -1 : 1;
        });
        foreach ($cats as $key => $cat){
            if($current_time > $this->getCatTime($cat)){
                unset($cats[$key]);
            }
        }
        $this->res_cats = $cats;
    }

    /**
     * @param $cat Category
     * @return integer
     */
    private function getCatTime($cat){
        $datetime = \DateTime::createFromFormat("d.m.Y - H:i:s", $cat->date . ' - 23:59:59');
        $timestamp = $datetime->getTimestamp();
        unset($datetime);
        return $timestamp;
    }

    public function run()
    {
        $result = array();
        $this->res_cats = array_values($this->res_cats);
        for($i = 0; $i < $this->count && $i < count($this->res_cats); $i++){
            $result[] = $this->res_cats[$i];
        }
        return $this->render('index', ['cats' => $result]);
    }
}