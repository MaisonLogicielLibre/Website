<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeMissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeMissionsTable Test Case
 */
class TypeMissionsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_missions',
        'app.missions',
        'app.mentors',
        'app.mission_levels',
        'app.missions_mission_levels',
        'app.missions_type_missions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypeMissions') ? [] : ['className' => 'App\Model\Table\TypeMissionsTable'];
        $this->TypeMissions = TableRegistry::get('TypeMissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeMissions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
