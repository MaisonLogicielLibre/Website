<?php
/**
 * Tests for MissionLevelsTable
 *
 * @category Test
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MissionLevelsTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for MissionLevelsTable
 *
 * @category Test
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
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
        
        'app.projects_contributors',
        'app.organizations',
        'app.organizations_projects',
        'app.projects_mentors',
        'app.type_users',
        'app.type_users_users',
        'app.missions_mission_levels',
        'app.type_missions'
    ];

    /**
     * SetUp method
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
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MissionLevels);

        parent::tearDown();
    }

    /**
     * Test getName
     *
     * @return void
     */
    public function testGetName()
    {
        $id = 1;
        $expected = '1';

        $level = $this->MissionLevels->get($id);

        $result = $level->getName();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test validation
     *
     * @return void
     */
    public function testValidation()
    {
        $validator = new Validator();

        $result = $this->MissionLevels->validationDefault($validator);

        $this->assertEquals($validator, $result);
    }

    /**
     * Test buildRules
     *
     * @return void
     */
    public function testBuildRules()
    {
        $rule = new RulesChecker();

        $expected = $rule;

        $result = $this->MissionLevels->buildRules($rule);

        $this->assertEquals($expected, $result);
    }
}
