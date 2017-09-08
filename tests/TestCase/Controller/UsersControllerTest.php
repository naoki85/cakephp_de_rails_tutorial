<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{
    public $users;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users'
    ];
    
    public function setUp()
    {
        parent::setUp();
        $this->base_title = 'Ruby on Rails Tutorial Sample App';
        $this->users      = TableRegistry::get('Users');
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/users');
        $this->assertResponseOk();
        $this->assertTemplate('Users/index');
        $this->assertResponseContains("Users Index | {$this->base_title}");
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/users/view/1');
        $this->assertResponseOk();
        $this->assertTemplate('Users/view');
        $this->assertResponseContains("Users View | {$this->base_title}");
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        // GET /users/add
        $this->get('/users/add');
        $this->assertResponseOk();
        $this->assertTemplate('Users/add');
        $this->assertResponseContains("Add User | {$this->base_title}");
        
        // POST /users/add
        // Case invalid parameters
        $before_count = $this->users->find()->count();
        $data = ['name' => 'hogehoge', 'email' => 'email@example.com',
            'password' => 'hogehoge', 'password_confirmation' => 'fugafuga'];
        $this->post('/users/add', $data);
        $this->assertResponseOk();
        $this->assertTemplate('Users/add');
        $this->assertEquals($before_count, $this->users->find()->count());
        
        // POST /users/add
        $before_count = $this->users->find()->count();
        $data = ['name' => 'hogehoge', 'email' => 'email@example.com',
            'password' => 'hogehoge', 'password_confirmation' => 'hogehoge'];
        $this->post('/users/add', $data);
        $this->assertEquals($before_count + 1, $this->users->find()->count());
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        // GET /users/edit
        $this->get('/users/edit/1');
        $this->assertResponseOk();
        $this->assertTemplate('Users/edit');
        $this->assertResponseContains("Edit User | {$this->base_title}");
        
        // POST /users/edit/1
        // Case invalid parameters
        $data = ['name' => 'hogehoge', 'email' => 'email@example.com',
            'password' => 'hogehoge', 'password_confirmation' => 'fugafuga'];
        $this->post('/users/edit/1', $data);
        $this->assertResponseOk();
        $this->assertTemplate('Users/edit');
        $user = $this->users->get(1);
        $this->assertEquals('test_name', $user->name);
        
        // POST /users/edit/1
        $data = ['name' => 'hogehoge', 'email' => 'email@example.com',
            'password' => 'hogehoge', 'password_confirmation' => 'hogehoge'];
        $this->post('/users/edit/1', $data);
        $user = $this->users->get(1);
        $this->assertEquals('hogehoge', $user->name);
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->post('/users/delete/1');
        $user = $this->users->find()->where(['id' => 1]);
        $this->assertEquals(0, $user->count());
    }
}
