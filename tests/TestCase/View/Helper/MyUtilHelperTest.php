<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\MyUtilHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

class MyUtilHelperTest extends TestCase
{
    public $helper = null;

    public function setUp()
    {
        parent::setUp();
        $View = new View();
        $this->helper = new MyUtilHelper($View);
    }
    
    public function testFullTitle()
    {
        $base_title = 'Ruby on Rails Tutorial Sample App';
        // $titleが渡されなかった場合、Sample Appが代わりに入る
        $title = '';
        $this->assertEquals("Sample App | {$base_title}", $this->helper->fullTitle($title));
        
        // $titleが渡された場合、その文字が入る
        $title = 'Home';
        $this->assertEquals("{$title} | {$base_title}", $this->helper->fullTitle($title));
    }
}