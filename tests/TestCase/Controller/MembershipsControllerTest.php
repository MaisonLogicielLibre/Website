<?php
namespace App\Test\TestCase\Controller;

use App\Controller\MembershipsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\MembershipsController Test Case
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
        'app.organizations_projects',
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
        'app.notifications'
    ];

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

        $this->assertResponseSuccess();

        //$organizations = TableRegistry::get("Organizations");
        //$organization = $organizations->get(2, ['contain' => 'Members']);
        //$members = $organization->getMembers();
        //$this->assertEquals(2, count($members));

        $memberships = TableRegistry::get('Memberships');
        $membership = $memberships->findByUserId($id)->toArray();
        $this->assertEquals(2, $membership[0]['organization_id']);
        $this->assertEquals(3, $membership[0]['user_id']);

        $notifications = TableRegistry::get('Notifications');
        $notification = $notifications->findByUserId(2)->toArray();

        $this->assertEquals(2, $notification[0]['user_id']);
        $this->assertEquals('memberships/accept/3', $notification[0]['link']);

    }

    public function testAcceptMember()
    {
        $id = 3;
        $this->session(['user' => ['id' => $id]]);

        $data = [
            'organization_id' => 2
        ];

        $this->post('/users/requestMember', $data);

        $this->get('/users/acceptMember/3');

        $this->assertTemplate('accept_member');
        //$this->assertResponseOk();
    }
}
