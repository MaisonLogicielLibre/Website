<?php
/**
 * Tests for ProjectsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectsTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for ProjectsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class ProjectsTableTest extends TestCase
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
        $config = TableRegistry::exists('Projects') ? [] : ['className' => 'App\Model\Table\ProjectsTable'];
        $this->Projects = TableRegistry::get('Projects', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Projects);

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

        $project = $this->Projects->get($id);

        $result = $project->getId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getName
     * @return void
     */
    public function testGetName()
    {
        $id = 1;
        $expected = 'projet1';

        $project = $this->Projects->get($id);

        $result = $project->getName();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getLink
     * @return void
     */
    public function testGetLink()
    {
        $id = 1;
        $expected = 'www.website.com';

        $project = $this->Projects->get($id);

        $result = $project->getLink();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getDescription
     * @return void
     */
    public function testGetDescription()
    {
        $id = 1;
        $expected = 'bla bla';

        $project = $this->Projects->get($id);

        $result = $project->getDescription();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test isAccepted
     * @return void
     */
    public function testIsAccepted()
    {
        $id = 1;
        $expected = 1;

        $project = $this->Projects->get($id);

        $result = $project->isAccepted();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test isArchived
     * @return void
     */
    public function testIsArchived()
    {
        $id = 1;
        $expected = 1;

        $project = $this->Projects->get($id);

        $result = $project->isArchived();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editName
     * @return void
     */
    public function testSetName()
    {
        $id = 1;
        $expected = 'projet';

        $project = $this->Projects->get($id);

        $result = $project->editName($expected);

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editLink
     * @return void
     */
    public function testSetLink()
    {
        $id = 1;
        $expected = 'www.allo.com';

        $project = $this->Projects->get($id);

        $result = $project->editLink($expected);

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editDescription
     * @return void
     */
    public function testSetDescription()
    {
        $id = 1;
        $expected = 'chose a lire';

        $project = $this->Projects->get($id);

        $result = $project->editDescription($expected);

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editAccepted
     * @return void
     */
    public function testSetAccepted()
    {
        $id = 1;
        $expected = 0;

        $project = $this->Projects->get($id);

        $result = $project->editAccepted($expected);

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editArchived
     * @return void
     */
    public function testSetArchived()
    {
        $id = 1;
        $expected = 0;

        $project = $this->Projects->get($id);

        $result = $project->editArchived($expected);

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
        
        $result = $this->Projects->validationDefault($validator);
        
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
        
        $result = $this->Projects->buildRules($rule);
        
        $this->assertEquals($expected, $result);
    }
}
