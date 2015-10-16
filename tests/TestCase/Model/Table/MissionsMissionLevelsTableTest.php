<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MissionsMissionLevelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MissionsMissionLevelsTable Test Case
 */
class MissionsMissionLevelsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.missions_mission_levels',
        'app.mission_levels',
        'app.missions',
        'app.projects',
        'app.applications',
        'app.users',
        'app.universities',
        'app.comments',
        'app.projects_contributors',
        'app.projects_mentored',
        'app.organizations',
        'app.organizations_projects',
        'app.contributors',
        'app.projects_mentors',
        'app.type_users',
        'app.type_users_users',
        'app.mentors',
        'app.type_applications',
        'app.type_missions',
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
        $config = TableRegistry::exists('MissionsMissionLevels') ? [] : ['className' => 'App\Model\Table\MissionsMissionLevelsTable'];
        $this->MissionsMissionLevels = TableRegistry::get('MissionsMissionLevels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MissionsMissionLevels);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
