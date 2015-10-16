<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'firstName' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'lastName' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'biography' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'portfolio' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'email' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'phone' => ['type' => 'string', 'length' => 25, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'gender' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'password' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'username' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'universitie_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'isAvailableMentoring' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'isStudent' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'firstName' => 'Simon',
            'lastName' => 'Begin',
            'biography' => 'Une petite bio.',
            'portfolio' => 'http://monportfolio.com',
            'email' => 'email@gmail.com',
            'phone' => '(514) 777-7777',
            'gender' => 1,
            'password' => 'motdepasse',
            'username' => 'tropHot',
            'universitie_id' => 1,
            'isAvailableMentoring' => 0,
            'isStudent' => 1
        ],
        [
            'id' => 2,
            'firstName' => 'Simon',
            'lastName' => 'Begin',
            'biography' => 'Une petite bio.',
            'portfolio' => 'http://monportfolio.com',
            'email' => 'email@gmail.com',
            'phone' => '(514) 777-7777',
            'gender' => 0,
            'password' => '$2y$10$fTukyN1X3G7nwp3Ea72p/eAuTdqjD6Xhft4tW8d/3pR46UBkCVKzO',
            'username' => 'admin',
            'universitie_id' => 1,
            'isAvailableMentoring' => 0,
            'isStudent' => 0
        ],
        [
            'id' => 3,
            'firstName' => 'Simon',
            'lastName' => '',
            'biography' => 'Une petite bio.',
            'portfolio' => 'http://monportfolio.com',
            'email' => 'email@gmail.com',
            'phone' => '(514) 777-7777',
            'gender' => null,
            'password' => '$2y$10$6DYQvHVFPlT06jcE7UbRfeFSkBt2zdMjnk8nMDnVQDUI32819Y5O.', //toto
            'username' => 'admin2',
            'universitie_id' => 1,
            'isAvailableMentoring' => 1,
            'isStudent' => 0
        ]
    ];
}
