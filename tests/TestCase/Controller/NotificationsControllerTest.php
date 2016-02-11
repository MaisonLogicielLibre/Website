<?php
/**
 * Tests for NotificationsController
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Controller;

use App\Controller\NotificationsController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * Tests for NotificationsController
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class NotificationsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.missions',
        'app.projects',
        'app.applications',
        'app.users',
        'app.universities',
        'app.projects_contributors',
        'app.organizations',
        'app.organizations_owners',
        'app.organizations_members',
        'app.organizations_projects',
        'app.projects_mentors',
        'app.type_users',
        'app.permissions',
        'app.permissions_type_users',
        'app.type_users_users',
        'app.mission_levels',
        'app.missions_mission_levels',
        'app.type_missions',
        'app.notifications',
        'app.news'
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Notifications') ? [] : ['className' => 'App\Model\Table\NotificationsTable'];
        $this->Notifications = TableRegistry::get('Notifications', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Notifications);

        parent::tearDown();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndexOk()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/notifications/index');
        $this->assertResponseSuccess();
    }

    /**
     * Test MarkAsRead method
     *
     * @return void
     */
    public function testMarkAsRead()
    {
        $id = 3;
        $expected = true;

        $this->session(['Auth.User.id' => 1]);

        $this->get('/notifications/markAsRead/3');

        $isRead = $this->Notifications->get($id)->isRead();

        $this->assertEquals($expected, $isRead);
    }

    /**
     * Test MarkAllAsRead method
     *
     * @return void
     */
    public function testMarkAllAsRead()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
