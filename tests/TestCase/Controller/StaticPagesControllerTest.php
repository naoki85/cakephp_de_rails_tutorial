<?php
namespace App\Test\TestCase\Controller;

use App\Controller\StaticPagesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\StaticPagesController Test Case
 */
class StaticPagesControllerTest extends IntegrationTestCase
{

    /**
     * Test home method
     *
     * @return void
     */
    public function testHome()
    {
        $this->get('/home');
        $this->assertTemplate('StaticPages/home');
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
    }
}
