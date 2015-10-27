<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PermissionsFixture
 *
 */
class PermissionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
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
            'name' => 'edit_organizations'
        ],
        [
            'id' => 2,
            'name' => 'delete_organizations'
        ],
        [
            'id' => 3,
            'name' => 'submit_organization'
        ],
        [
            'id' => 4,
            'name' => 'add_organization'
        ],
        [
            'id' => 5,
            'name' => 'edit_organization'
        ],
        [
            'id' => 6,
            'name' => 'delete_organization'
        ],
        [
            'id' => 7,
            'name' => 'edit_projects'
        ],
        [
            'id' => 8,
            'name' => 'delete_projects'
        ],
        [
            'id' => 9,
            'name' => 'submit_project'
        ],
        [
            'id' => 10,
            'name' => 'add_project'
        ],
        [
            'id' => 11,
            'name' => 'edit_project'
        ],
        [
            'id' => 12,
            'name' => 'delete_project'
        ],
        [
            'id' => 13,
            'name' => 'edit_missions'
        ],
        [
            'id' => 14,
            'name' => 'delete_missions'
        ],
        [
            'id' => 15,
            'name' => 'add_mission'
        ],
        [
            'id' => 16,
            'name' => 'edit_mission'
        ],
        [
            'id' => 17,
            'name' => 'delete_mission'
        ],
        [
            'id' => 18,
            'name' => 'submit_mission'
        ],
        [
            'id' => 19,
            'name' => 'edit_applications'
        ],
        [
            'id' => 20,
            'name' => 'delete_applications'
        ],
        [
            'id' => 21,
            'name' => 'add_application'
        ],
        [
            'id' => 22,
            'name' => 'edit_application'
        ],
        [
            'id' => 23,
            'name' => 'delete_application'
        ],
        [
            'id' => 24,
            'name' => 'edit_users'
        ],
        [
            'id' => 25,
            'name' => 'delete_users'
        ],
        [
            'id' => 26,
            'name' => 'edit_user'
        ],
        [
            'id' => 27,
            'name' => 'delete_user'
        ],
        [
            'id' => 28,
            'name' => 'list_users'
        ],
        [
            'id' => 29,
            'name' => 'view_users'
        ],
        [
            'id' => 30,
            'name' => 'view_user'
        ],
        [
            'id' => 31,
            'name' => 'list_projects'
        ],
        [
            'id' => 32,
            'name' => 'list_projects_all'
        ],
        [
            'id' => 33,
            'name' => 'list_organizations'
        ],
        [
            'id' => 34,
            'name' => 'list_organizations_all'
        ],
		[
            'id' => 35,
            'name' => 'quit_organization'
        ]
    ];
}
