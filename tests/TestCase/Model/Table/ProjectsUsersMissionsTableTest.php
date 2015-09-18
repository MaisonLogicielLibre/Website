<?php
/**
 * Tests for ProjectsUsersMissionsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectsUsersMissionsTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for ProjectsUsersMissionsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class ProjectsUsersMissionsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.organizations',
    'app.organizations_Projects',
    'app.projects_users_missions',
    'app.users',
        'app.type_users',
    'app.svn_users',
    'app.svns',
        'app.universities',
        'app.comments',
        'app.projects',
        'app.projects_users',
    'app.missions'
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProjectsUsersMissions') ? [] : ['className' => 'App\Model\Table\ProjectsUsersMissionsTable'];
        $this->ProjectsUsersMissions = TableRegistry::get('ProjectsUsersMissions', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectsUsersMissions);

        parent::tearDown();
    }

    /**
     * Test getId
     * @return void
     */
    public function testGetId()
    {
        $id = 1;
        $expected = 1;

        $pro = $this->ProjectsUsersMissions->get($id);

        $result = $pro->getId();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getProjectsUserId
     * @return void
     */
    public function testGetProjectUserId()
    {
        $id = 1;
        $expected = 1;

        $pro = $this->ProjectsUsersMissions->get($id);

        $result = $pro->getProjectsUserId();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getMissionId
     * @return void
     */
    public function testGetMissionId()
    {
        $id = 1;
        $expected = 1;

        $pro = $this->ProjectsUsersMissions->get($id);

        $result = $pro->getMissionId();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test validation
     * @return void
     */
    public function testValidation()
    {
        $validator = new Validator();
        
        $expected = $validator;
        
        $result = $this->ProjectsUsersMissions->validationDefault($validator);
        
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
        
        $result = $this->ProjectsUsersMissions->buildRules($rule);
        
        $this->assertEquals($expected, $result);
    }
}
