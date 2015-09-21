<?php
/**
 * Tests for TypeUsersUsersTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeUsersUsersTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for TypeUsersUsersTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class TypeUsersUsersTableTest extends TestCase
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
        $config = TableRegistry::exists('TypeUsersUsers') ? [] : ['className' => 'App\Model\Table\TypeUsersUsersTable'];
        $this->TypeUsersUsers = TableRegistry::get('TypeUsersUsers', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeUsersUsers);

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

        $type = $this->TypeUsersUsers->get($id);

        $result = $type->getId();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getTypeUserId
     * @return void
     */
    public function testGetTypeUserId()
    {
        $id = 1;
        $expected = 1;

        $type = $this->TypeUsersUsers->get($id);

        $result = $type->getTypeUserId();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getUserId
     * @return void
     */
    public function testGetUserId()
    {
        $id = 1;
        $expected = 1;

        $type = $this->TypeUsersUsers->get($id);

        $result = $type->getUserId();

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
        
        $result = $this->TypeUsersUsers->validationDefault($validator);
        
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
        
        $result = $this->TypeUsersUsers->buildRules($rule);
        
        $this->assertEquals($expected, $result);
    }
}
