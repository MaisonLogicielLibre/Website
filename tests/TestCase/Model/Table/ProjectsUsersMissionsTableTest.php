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
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

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
        'app.projects_users_missions',
        'app.projects_users',
        'app.users',
        'app.type_users',
        'app.universities',
        'app.comments',
        'app.projects',
        'app.missions',
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
}
