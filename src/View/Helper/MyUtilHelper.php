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
     * @param  [String]
     * @return [String]
     */
    public function fullTitle($title)
    {
        if (empty($title)) $title = 'Sample App';
        $base_title = "Ruby on Rails Tutorial Sample App";
        return "{$title} | {$base_title}";
    }
}