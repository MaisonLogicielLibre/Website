<?php
/**
 * Tests for ProjectsUsersTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Tests for ProjectsUsersTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class ProjectsUsersTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.projects_users',
        'app.users',
        'app.type_users',
        'app.universities',
        'app.comments',
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
        $config = TableRegistry::exists('ProjectsUsers') ? [] : ['className' => 'App\Model\Table\ProjectsUsersTable'];
        $this->ProjectsUsers = TableRegistry::get('ProjectsUsers', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectsUsers);

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

        $pro = $this->ProjectsUsers->get($id);

        $result = $pro->getId();

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

        $pro = $this->ProjectsUsers->get($id);

        $result = $pro->getUserId();

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

        $pro = $this->ProjectsUsers->get($id);

        $result = $pro->getProjectId();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getCV
     * @return void
     */
    public function testGetCV()
    {
        $id = 1;
        $expected = 'www.cv.com';

        $pro = $this->ProjectsUsers->get($id);

        $result = $pro->getCV();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getDescription
     * @return void
     */
    public function testGetDescription()
    {
        $id = 1;
        $expected = 'Do things';

        $pro = $this->ProjectsUsers->get($id);

        $result = $pro->getDescription();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getPresentation
     * @return void
     */
    public function testGetPresentation()
    {
        $id = 1;
        $expected = 'Us';

        $pro = $this->ProjectsUsers->get($id);

        $result = $pro->getPresentation();

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

        $pro = $this->ProjectsUsers->get($id);

        $result = $pro->isAccepted();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test isMentor
     * @return void
     */
    public function testIsMentor()
    {
        $id = 1;
        $expected = 1;

        $pro = $this->ProjectsUsers->get($id);

        $result = $pro->isMentor();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editCV
     * @return void
     */
    public function testSetCV()
    {
        $id = 1;
        $expected = 'www.cv2.com';

        $pro = $this->ProjectsUsers->get($id);

        $result = $pro->editCV($expected);

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editDescription
     * @return void
     */
    public function testSetDescription()
    {
        $id = 1;
        $expected = 'Stuff';

        $pro = $this->ProjectsUsers->get($id);

        $result = $pro->editDescription($expected);

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editPresentation
     * @return void
     */
    public function testSetPresentation()
    {
        $id = 1;
        $expected = 'Presentation';

        $pro = $this->ProjectsUsers->get($id);

        $result = $pro->editPresentation($expected);

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

        $pro = $this->ProjectsUsers->get($id);

        $result = $pro->editAccepted($expected);

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editMentor
     * @return void
     */
    public function testSetMentor()
    {
        $id = 1;
        $expected = 0;

        $pro = $this->ProjectsUsers->get($id);

        $result = $pro->editMentor($expected);

        $this->assertEquals($expected, $result);
    }
}
