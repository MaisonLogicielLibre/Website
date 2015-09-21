<?php
/**
 * Tests for OrganizationsProjectsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
 
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrganizationsProjectsTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for OrganizationsProjectsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class OrganizationsProjectsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
    'app.type_users_users',
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
        $config = TableRegistry::exists('OrganizationsProjects') ? [] : ['className' => 'App\Model\Table\OrganizationsProjectsTable'];
        $this->OrganizationsProjects = TableRegistry::get('OrganizationsProjects', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrganizationsProjects);

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

        $pro = $this->OrganizationsProjects->get($id);

        $result = $pro->getId();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getProjectId
     * @return void
     */
    public function testGetProjectId()
    {
        $id = 1;
        $expected = 1;

        $pro = $this->OrganizationsProjects->get($id);

        $result = $pro->getProjectId();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getOrganization
     * @return void
     */
    public function testGetOrganization()
    {
        $id = 1;
        $expected = 1;

        $pro = $this->OrganizationsProjects->get($id);

        $result = $pro->getOrganization();

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
        
        $result = $this->OrganizationsProjects->validationDefault($validator);
        
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
        
        $result = $this->OrganizationsProjects->buildRules($rule);
        
        $this->assertEquals($expected, $result);
    }
}
