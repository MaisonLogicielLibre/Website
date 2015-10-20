<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MissionsMissionLevelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

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
        'app.mission_levels',
        'app.missions',
        'app.projects',
        'app.applications',
        'app.users',
        'app.universities',
        'app.comments',
        'app.projects_contributors',
        'app.organizations',
        'app.organizations_projects',
        'app.projects_mentors',
        'app.type_users',
        'app.type_users_users',
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
     * Test validation
     * @return void
     */
    public function testValidation()
    {
        $validator = new Validator();

        $result = $this->MissionsMissionLevels->validationDefault($validator);

        $this->assertEquals($validator, $result);
    }

    /**
     * Test buildRules
     * @return void
     */
    public function testBuildRules()
    {
        $rule = new RulesChecker();

        $expected = $rule;

        $result = $this->MissionsMissionLevels->buildRules($rule);

        $this->assertEquals($expected, $result);
    }

}
