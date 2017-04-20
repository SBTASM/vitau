<?php
// DemoPager.php
namespace common\widgets;

use Yii;
use yii\helpers\Html;

class LinkPager extends \justinvoelker\separatedpager\LinkPager
{

    public $pager_layout = '{pageButtons}';
    public $maxButtonCount = 5;
    public $sizeListHtmlOptions = [];

    // e.g. &page=1&per-page=5
    // Pagination query string params name
    // I'd like to add underscore to vars' name to avoid any overriden
    protected $_page_param = 'page';
    protected $_page_size_param = 'per-page';


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();
    }
}