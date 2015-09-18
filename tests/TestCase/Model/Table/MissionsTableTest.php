<?php
/**
 * Tests for MissionsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
 
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MissionsTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for CommentsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class MissionsTableTest extends TestCase
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
        $config = TableRegistry::exists('Missions') ? [] : ['className' => 'App\Model\Table\MissionsTable'];
        $this->Missions = TableRegistry::get('Missions', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Missions);

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

        $mission = $this->Missions->get($id);

        $result = $mission->getId();

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

        $mission = $this->Missions->get($id);

        $result = $mission->getProjectId();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getRole
     * @return void
     */
    public function testGetRole()
    {
        $id = 1;
        $expected = 'Dev';

        $mission = $this->Missions->get($id);

        $result = $mission->getRole();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getMission
     * @return void
     */
    public function testGetMission()
    {
        $id = 1;
        $expected = 'Do stuff';

        $mission = $this->Missions->get($id);

        $result = $mission->getMission();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test isActive
     * @return void
     */
    public function testIsActive()
    {
        $id = 1;
        $expected = 1;

        $mission = $this->Missions->get($id);

        $result = $mission->isActive();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editRole
     * @return void
     */
    public function testSetRole()
    {
        $id = 1;
        $expected = 'Test';

        $mission = $this->Missions->get($id);

        $result = $mission->editRole($expected);

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editMission
     * @return void
     */
    public function testSetMission()
    {
        $id = 1;
        $expected = 'Do more stuff';

        $mission = $this->Missions->get($id);

        $result = $mission->editMission($expected);

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editActive
     * @return void
     */
    public function testSetActive()
    {
        $id = 1;
        $expected = 0;

        $mission = $this->Missions->get($id);

        $result = $mission->editActive($expected);

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
        
        $result = $this->Missions->validationDefault($validator);
        
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
        
        $result = $this->Missions->buildRules($rule);
        
        $this->assertEquals($expected, $result);
    }
}
