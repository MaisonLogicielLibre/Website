<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrganizationsFixture
 *
 */
class OrganizationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'website' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'logo' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'isValidated' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'isRejected' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
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
            'name' => 'MLL',
            'website' => 'www.website.com',
            'logo' => '/img/logo.jpg',
            'description' => 'Awesome',
            'isValidated' => 0,
            'isRejected' => 0
        ],
        [
            'id' => 2,
            'name' => 'MLL2',
            'website' => 'www.website.com',
            'logo' => '/img/logo.jpg',
            'description' => 'Awesome',
            'isValidated' => 1,
            'isRejected' => 0
        ],
        [
            'id' => 3,
            'name' => 'MLL2',
            'website' => 'www.website.com',
            'logo' => '/img/logo.jpg',
            'description' => 'Awesome',
            'isValidated' => 1,
            'isRejected' => 1
        ],
        [
            'id' => 4,
            'name' => 'Org4',
            'website' => 'www.website.com',
            'logo' => '/img/logo.jpg',
            'description' => 'Awesome',
            'isValidated' => 1,
            'isRejected' => 0
        ],
    ];
}
