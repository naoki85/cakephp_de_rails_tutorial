<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    public $Users;
    private $data;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = TableRegistry::get('Users', $config);
        $this->data = ['name' => 'Example User', 'email' => 'user@example.com'];
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

        parent::tearDown();
    }
    
    public function testValidation() {
        $user = $this->Users->newEntity($this->data);
        $this->assertEmpty($user->errors());
    }
    
    public function testValidationOfName() {
        $this->data['name'] = '';
        $user = $this->Users->newEntity($this->data);
        $this->assertNotEmpty($user->errors());
        
        $this->data['name'] = str_repeat('a', 51);
        $user = $this->Users->newEntity($this->data);
        $this->assertNotEmpty($user->errors());
    }
    
    public function testValidationOfEmail()
    {
        $this->data['email'] = '';
        $user = $this->Users->newEntity($this->data);
        $this->assertNotEmpty($user->errors());
        
        $this->data['email'] = sprintf("%s@example.com", str_repeat('a', 244));
        $user = $this->Users->newEntity($this->data);
        $this->assertNotEmpty($user->errors());
    }
    
    public function testApplicationRulesOfEmail()
    {
        $user = $this->Users->newEntity($this->data);
        $user_clone = clone $user;
        $this->Users->save($user);
        $this->assertEquals(false, $this->Users->save($user_clone));
    }
    
    public function testBeforeSave()
    {
        $user = $this->Users->newEntity($this->data);
        $this->data['email'] = 'USER@example.com';
        $user_clone = $this->Users->newEntity($this->data);
        $this->Users->save($user);
        $this->assertEquals(false, $this->Users->save($user_clone));
    }
}
