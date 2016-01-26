<?php
/**
 * Tests for ProjectsMentorsTable
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectsMentorsTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for ProjectsMentorsTable
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class ProjectsMentorsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.projects',
        'app.missions',
        'app.applications',
        'app.users',
        'app.universities',
        
        'app.projects_contributors',
        'app.projects_mentors',
        'app.organizations',
        'app.organizations_projects',
        'app.type_users',
        'app.permissions',
        'app.permissions_type_users',
        'app.type_users_users',
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProjectsMentors') ? [] : ['className' => 'App\Model\Table\ProjectsMentorsTable'];
        $this->ProjectsMentors = TableRegistry::get('ProjectsMentors', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectsMentors);

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

        $expected = $validator;

        $result = $this->ProjectsMentors->validationDefault($validator);

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

        $result = $this->ProjectsMentors->buildRules($rule);

        $this->assertEquals($expected, $result);
    }
}
