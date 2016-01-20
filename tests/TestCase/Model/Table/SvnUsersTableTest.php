<?php
/**
 * Tests for SvnUsersTable
 *
 * @category Test
 * @package  Website
 * @author   Simon Begin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SvnUsersTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for SvnUsersTable
 *
 * @category Test
 * @package  Website
 * @author   Simon Begin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class SvnUsersTableTest extends TestCase
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
        $config = TableRegistry::exists('SvnUsers') ? [] : ['className' => 'App\Model\Table\SvnUsersTable'];
        $this->SvnUsers = TableRegistry::get('SvnUsers', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SvnUsers);

        parent::tearDown();
    }

    /**
     * Test getId
     *
     * @return void
     */
    public function testGetId()
    {
        $id = 1;
        $expected = 1;

        $svn = $this->SvnUsers->get($id);

        $result = $svn->getId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getPseudo
     *
     * @return void
     */
    public function testGetPseudo()
    {
        $id = 1;
        $expected = 'pseudo';

        $svn = $this->SvnUsers->get($id);

        $result = $svn->getPseudo();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getSvnId
     *
     * @return void
     */
    public function testGetSvnId()
    {
        $id = 1;
        $expected = 1;

        $svn = $this->SvnUsers->get($id);

        $result = $svn->getSvnId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getUserId
     *
     * @return void
     */
    public function testGetUserId()
    {
        $id = 1;
        $expected = 1;

        $svn = $this->SvnUsers->get($id);

        $result = $svn->getUserId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editPseudo
     *
     * @return void
     */
    public function testSetPseudo()
    {
        $id = 1;
        $expected = 'pseudo';

        $svn = $this->SvnUsers->get($id);

        $result = $svn->editPseudo($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editSvnId
     *
     * @return void
     */
    public function testSetSvnId()
    {
        $id = 1;
        $expected = 1;

        $svn = $this->SvnUsers->get($id);

        $result = $svn->editSvnId($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editUserId
     *
     * @return void
     */
    public function testSetUserId()
    {
        $id = 1;
        $expected = 1;

        $svn = $this->SvnUsers->get($id);

        $result = $svn->editUserId($expected);

        $this->assertEquals($expected, $result);
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

        $result = $this->SvnUsers->validationDefault($validator);

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

        $result = $this->SvnUsers->buildRules($rule);

        $this->assertEquals($expected, $result);
    }
}
