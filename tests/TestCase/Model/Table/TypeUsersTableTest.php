<?php
/**
 * Tests for TypeUsersTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeUsersTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for TypeUsersTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class TypeUsersTableTest extends TestCase
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
        $config = TableRegistry::exists('TypeUsers') ? [] : ['className' => 'App\Model\Table\TypeUsersTable'];
        $this->TypeUsers = TableRegistry::get('TypeUsers', $config);
    }
    
    /**
     * Test getId
     * @return void
     */
    public function testGetId()
    {
        $id = 1;
        $expected = 1;

        $type = $this->TypeUsers->get($id);

        $result = $type->getId();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getName
     * @return void
     */
    public function testGetName()
    {
        $id = 1;
        $expected = 'Student';

        $type = $this->TypeUsers->get($id);

        $result = $type->getName();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editName
     * @return void
     */
    public function testSetName()
    {
        $id = 1;
        $expected = 'Administrator';

        $type = $this->TypeUsers->get($id);

        $result = $type->editName($expected);

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
        
        $result = $this->TypeUsers->validationDefault($validator);
        
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
        
        $result = $this->TypeUsers->buildRules($rule);
        
        $this->assertEquals($expected, $result);
    }
}
