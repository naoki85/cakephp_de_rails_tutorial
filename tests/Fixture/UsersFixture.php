<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    public $import = ['model' => 'Users'];

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'name' => 'test_name',
            'email' => 'test@example.com',
            'password_digest' => '',
            'created' => '2017-08-31 22:42:05',
            'modified' => '2017-08-31 22:42:05'
        ],
    ];
}
