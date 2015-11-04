<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HashesFixture
 *
 */
class HashesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'hash' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'used' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'time' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'hash_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
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
    public function init() {
        $this->records = [
            [
                'id' => 1,
                'hash' => '31f7a65e315586ac198bd798b6629ce4903d0899476d5741a9f32e2e521b6a66', // "toto"
                'used' => 0,
                'time' => 86400,
                'created' => date('Y-m-d H:i:s'),
                'user_id' => 1,
                'hash_type_id' => 1
            ],
            [
                'id' => 2,
                'hash' => 'cce66316b4c1c59df94a35afb80cecd82d1a8d91b554022557e115f5c275f515', // "titi"
                'used' => 1,
                'time' => 86400,
                'created' => date('Y-m-d H:i:s'),
                'user_id' => 1,
                'hash_type_id' => 1
            ],
            [
                'id' => 3,
                'hash' => 'eb0295d98f37ae9e95102afae792d540137be2dedf6c4b00570ab1d1f355d033', // "tutu"
                'used' => 0,
                'time' => 86400,
                'created' => '2007-03-18 10:39:23',
                'user_id' => 1,
                'hash_type_id' => 1
            ],
            [
                'id' => 4,
                'hash' => 'd1c7c99c6e2e7b311f51dd9d19161a5832625fb21f35131fba6da62513f0c099', // "tata"
                'used' => 0,
                'time' => 86400,
                'created' => date('Y-m-d H:i:s'),
                'user_id' => 1,
                'hash_type_id' => 2
            ],
        ];
        parent::init();
    }
}
