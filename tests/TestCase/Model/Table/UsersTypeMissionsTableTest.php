<?php
/**
 * Test for UsersTypeMissionsTable
 *
 * @category Test
 * @package  Website
 * @author   Félix Leblanc <felix.leblanc1305@gmail.com>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTypeMissionsTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Test for UsersTypeMissionsTable
 *
 * @category Test
 * @package  Website
 * @author   Félix Leblanc <felix.leblanc1305@gmail.com>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class UsersTypeMissionsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_type_missions',
        'app.users',
        'app.universities',
        'app.hashes',
        'app.applications',
        'app.missions',
        'app.projects',
        'app.organizations',
        'app.organizations_projects',
        'app.svn_users',
        'app.svns',
        'app.projects_contributors',
        'app.projects_mentors',
        'app.type_users',
        'app.permissions',
        'app.permissions_type_users',
        'app.type_users_users',
        'app.organizations_owners',
        'app.organizations_members',
        'app.type_missions',
        'app.mission_levels',
        'app.missions_mission_levels'
    ];

    /**
     * SetUp setup the test case
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersTypeMissions') ? [] : ['className' => 'App\Model\Table\UsersTypeMissionsTable'];
        $this->UsersTypeMissions = TableRegistry::get('UsersTypeMissions', $config);
    }

    /**
     * TearDown teardown the test case
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersTypeMissions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $validator = new Validator();

        $expected = $validator;

        $result = $this->UsersTypeMissions->validationDefault($validator);

        $this->assertEquals($validator, $result);
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $rule = new RulesChecker();

        $expected = $rule;

        $result = $this->UsersTypeMissions->buildRules($rule);

        $this->assertEquals($expected, $result);
    }
}
