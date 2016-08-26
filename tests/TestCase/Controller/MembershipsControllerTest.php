<?php
/**
 * Memberships Controller
 *
 * @category Table
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Controller;

use App\Controller\MembershipsController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * Memberships Controller
 *
 * @category Table
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class MembershipsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.memberships',
        'app.organizations',
        'app.projects',
        'app.missions',
        'app.users',
        'app.universities',
        'app.hashes',
        'app.applications',
        'app.svn_users',
        'app.svns',
        'app.projects_contributors',
        'app.projects_mentors',
        'app.type_users',
        'app.permissions',
        'app.permissions_type_users',
        'app.type_users_users',
        'app.organizations_owners',
        'app.type_missions',
        'app.users_type_missions',
        'app.organizations_members',
        'app.mission_levels',
        'app.missions_mission_levels',
        'app.notifications',
        'app.news'
    ];

    /**
     * Test add method
     *
     * @return void
     */
    public function testAddGet()
    {
        $id = 3;
        $this->session(['user' => ['id' => $id]]);

        $data = [
            'organization_id' => 2
        ];

        $this->get('/memberships/add');
        $this->assertResponseSuccess();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $id = 3;
        $this->session(['user' => ['id' => $id]]);

        $data = [
            'organization_id' => 2
        ];

        $this->post('/memberships/add', $data);

        $memberships = TableRegistry::get('Memberships');
        $membership = $memberships->findByUserId($id)->toArray();
        $this->assertEquals(2, $membership[0]['organization_id']);
        $this->assertEquals(3, $membership[0]['user_id']);

        $notifications = TableRegistry::get('Notifications');
        $notification = $notifications->findByUserId(2)->toArray();

        $this->assertEquals(2, $notification[0]['user_id']);
        $this->assertEquals('memberships/accept/2', $notification[0]['link']);
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAcceptMember()
    {
        $id = 3;
        $this->session(['user' => ['id' => $id]]);

        $data = [
            'organization_id' => 2
        ];

        $this->post('/memberships/add', $data);

        $notifications = TableRegistry::get('Notifications');
        $notification = $notifications->findByUserId(2)->toArray();
        $link = $notification[0]['link'];

        $this->session(['Auth.User.id' => 1]);
        $this->post($link);

        $organizations = TableRegistry::get('Organizations');
        $organization = $organizations->get(2, ['contain' => 'Members']);
        $members = $organization->getMembers();

        //var_dump(count($members));
        $this->assertEquals(2, count($members));
        $this->assertRedirect(['controller' => 'Organizations', 'action' => 'view', 2]);
    }
}
