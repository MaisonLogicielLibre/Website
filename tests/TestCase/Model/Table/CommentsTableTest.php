<?php
/**
 * Tests for CommentsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
 
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommentsTable;
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
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class CommentsTableTest extends TestCase
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
    'app.users',
    'app.type_users',
    'app.svn_users',
    'app.svns',
    'app.universities',
    'app.comments',
    'app.projects',
    'app.projects_contributors',
    'app.projects_mentors',
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
        $config = TableRegistry::exists('Comments') ? [] : ['className' => 'App\Model\Table\CommentsTable'];
        $this->Comments = TableRegistry::get('Comments', $config);
    }

    /**
     * Teardown method
     * @return void
     */
    public function tearDown()
    {
        unset($this->Comments);

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

        $comment = $this->Comments->get($id);

        $result = $comment->getId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getProjectsUserId
     * @return void
     */
    public function testGetProjectsUserId()
    {
        $id = 1;
        $expected = 1;

        $comment = $this->Comments->get($id);

        $result = $comment->getProjectsUserId();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getText
     * @return void
     */
    public function testGetText()
    {
        $id = 1;
        $expected = 'Du texte';

        $comment = $this->Comments->get($id);

        $result = $comment->getText();

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

        $comment = $this->Comments->get($id);

        $result = $comment->getUserId();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editText
     * @return void
     */
    public function testSetText()
    {
        $id = 1;
        $expected = 'stuff';

        $comment = $this->Comments->get($id);

        $result = $comment->editText($expected);

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
        
        $result = $this->Comments->validationDefault($validator);
        
        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test buildRules
     * @return void
     */
    public function testBuildRules()
    {
        $rule = new RulesChecker();
        
        $expected = $rule;
        
        $result = $this->Comments->buildRules($rule);
        
        $this->assertEquals($expected, $result);
    }
}
