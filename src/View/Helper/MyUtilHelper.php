<?php
namespace App\View\Helper;

use Cake\View\Helper;

/**
 * MyUtil Helper
 *
 * These methods are used with many files.
 */
class MyUtilHelper extends Helper
{
    /**
     * Return full title for the title tag. 
     * 
     * @return [String]
     */
    public function fullTitle()
    {
        $title = $this->_View->get('title');
        $base_title = "Ruby on Rails Tutorial Sample App";
        return "{$title} | {$base_title}";
    }
}