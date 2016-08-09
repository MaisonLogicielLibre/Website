<?php
/**
 * Tests for MissionsMissionLevelsTable
 *
 * @category Test
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MissionsMissionLevelsTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for MissionsMissionLevelsTable
 *
 * @category Test
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
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
        'app.projects_contributors',
        'app.organizations',
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
        $config = TableRegistry::exists('MissionsMissionLevels') ? [] : ['className' => 'App\Model\Table\MissionsMissionLevelsTable'];
        $this->MissionsMissionLevels = TableRegistry::get('MissionsMissionLevels', $config);
    }

    /**
     * TearDown method
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
     *
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
     *
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
