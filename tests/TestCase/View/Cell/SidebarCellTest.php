<?php
/**
 * Tests for SidebarCell
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\View\Cell;

use App\View\Cell\SidebarCell;
use Cake\TestSuite\TestCase;

/**
 * Tests for SidebarCell
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class SidebarCellTest extends TestCase
{

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->request = $this->getMock('Cake\Network\Request');
        $this->response = $this->getMock('Cake\Network\Response');
        $this->Sidebar = new SidebarCell($this->request, $this->response);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sidebar);

        parent::tearDown();
    }

    /**
     * Test user
     *
     * @return void
     */
    public function testUser()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    /**
     * Test projectAction
     *
     * @return void
     */
    public function testProjectAction()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    /**
     * Test project
     *
     * @return void
     */
    public function testProject()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    /**
     * Test organizationAction
     *
     * @return void
     */
    public function testOrganizationAction()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    /**
     * Test organization
     *
     * @return void
     */
    public function testOrganization()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
