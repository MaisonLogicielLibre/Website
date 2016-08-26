<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectsFixture
 *
 */
class ProjectsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'link' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'accepted' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'archived' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'repository_link' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'organization_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
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
            'name' => 'projet1',
            'link' => 'www.website.com',
            'description' => 'bla bla',
            'accepted' => 1,
            'archived' => 0,
            'created' => '2016-08-09 17:16:35',
            'modified' => '2016-08-09 17:16:35',
            'organization_id' => 1
        ],
        [
            'id' => 2,
            'name' => 'projet2',
            'link' => 'www.website.com',
            'description' => 'bla bla',
            'accepted' => 1,
            'archived' => 0,
            'created' => '2016-08-09 17:16:35',
            'modified' => '2016-08-09 17:16:35',
            'organization_id' => 1
        ],
        [
            'id' => 3,
            'name' => 'projet3',
            'link' => 'www.website.com',
            'description' => 'bla bla',
            'accepted' => 0,
            'archived' => 0,
            'created' => '2016-08-09 17:16:35',
            'modified' => '2016-08-09 17:16:35',
            'organization_id' => 1
        ],
        [
            'id' => 4,
            'name' => 'projet4',
            'link' => 'www.website.com',
            'description' => 'bla bla',
            'accepted' => 0,
            'archived' => 1,
            'created' => '2016-08-09 17:16:35',
            'modified' => '2016-08-09 17:16:35',
            'organization_id' => 1
        ],
        [
            'id' => 5,
            'name' => 'projet5',
            'link' => 'www.website.com',
            'description' => 'bla bla',
            'accepted' => 0,
            'archived' => 1,
            'created' => '2016-08-09 17:16:35',
            'modified' => '2016-08-09 17:16:35',
            'organization_id' => 1
        ],
        [
            'id' => 6,
            'name' => 'projet6',
            'link' => 'www.website.com',
            'description' => 'bla bla',
            'accepted' => 1,
            'archived' => 0,
            'created' => '2016-08-09 17:16:35',
            'modified' => '2016-08-09 17:16:35',
            'organization_id' => 1
        ]
    ];
}
