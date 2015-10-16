<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MissionLevelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MissionLevelsTable Test Case
 */
class MissionLevelsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.missions_mission_levels',
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
        $config = TableRegistry::exists('MissionLevels') ? [] : ['className' => 'App\Model\Table\MissionLevelsTable'];
        $this->MissionLevels = TableRegistry::get('MissionLevels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MissionLevels);

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
