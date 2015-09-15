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
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

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
        'app.svn_users',
        'app.svns',
        'app.users',
        'app.type_users',
        'app.universities',
        'app.comments',
        'app.projects_users',
        'app.projects',
        'app.missions',
        'app.projects_users_missions',
        'app.organizations',
        'app.organizations_projects'
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
}
