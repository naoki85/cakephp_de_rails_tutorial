<?php
namespace App\Test\TestCase\Controller;

use App\Controller\StaticPagesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\StaticPagesController Test Case
 */
class StaticPagesControllerTest extends IntegrationTestCase
{
    public $base_title;
    
    public function setUp()
    {
        parent::setUp();
        $this->base_title = 'Ruby on Rails Tutorial Sample App';
    }

    /**
     * Test home method
     *
     * @return void
     */
    public function testHome()
    {
        $this->get('/home');
        $this->assertTemplate('StaticPages/home');
        $this->assertResponseContains("Home | {$this->base_title}");
    }
    
    /**
     * Test help method
     *
     * @return void
     */
    public function testHelp()
    {
        $this->get('/help');
        $this->assertTemplate('StaticPages/help');
        $this->assertResponseContains("Help | {$this->base_title}");
    }
    
    /**
     * Test about method
     *
     * @return void
     */
    public function testAbout()
    {
        $this->get('/about');
        $this->assertTemplate('StaticPages/about');
        $this->assertResponseContains("About | {$this->base_title}");
    }
    
    /**
     * Test contact method
     *
     * @return void
     */
    public function testContact()
    {
        $this->get('/contact');
        $this->assertTemplate('StaticPages/contact');
        $this->assertResponseContains("Contact | {$this->base_title}");
    }
}
