<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TypeUsersFixture
 *
 */
class TypeUsersFixture extends TestFixture
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
            'name' => 'User'
        ],
		[
            'id' => 2,
            'name' => 'Executive'
        ],
		[
            'id' => 3,
            'name' => 'Administrator'
        ],
        [
            'id' => 4,
            'name' => 'Dyn_mentor'
        ],
        [
            'id' => 5,
            'name' => 'Dyn_OrganizationOwner'
        ],
		[
            'id' => 6,
            'name' => 'Executive'
        ],
		[
            'id' => 7,
            'name' => 'Dyn_OrganizationMember'
        ]
    ];
}
