<?php
/**
 * Tests for CommentsController
 *
 * @category Test
 * @package  Website
 * @author   Simon Begin <ak36250@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Controller;

use App\Controller\ApplicationsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * Tests for CommentsController
 *
 * @category Test
 * @package  Website
 * @author   Simon Begin <ak36250@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class ApplicationsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applications',
        'app.missions',
        'app.projects',
        'app.organizations',
        'app.organizations_projects',
        'app.universities',
        'app.users',
        'app.hashes',
        'app.projects_contributors',
        'app.projects_mentors',
        'app.type_users',
        'app.permissions',
        'app.permissions_type_users',
        'app.type_users_users',
        'app.organizations_owners',
        'app.organizations_members',
        'app.mission_levels',
        'app.missions_mission_levels',
        'app.type_missions'
    ];

    /**
     * Test accepted - Ok
     *
     * @return void
     */
    public function testAcceptedOk()
    {
        $this->session(['Auth.User.id' => 3]);

        $this->get('/applications/accepted/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test acceptedPost - Post empty data
     *
     * @return void
     */
    public function testAcceptedPost()
    {
        $this->session(['Auth.User.id' => 1]);

        $data = [];
        $this->post('/applications/accepted/1', $data);
        $this->assertResponseSuccess();
    }

    /**
     * Test accepted - No Authentification
     *
     * @return void
     */
    public function testAcceptedNoAuth()
    {
        $this->get('/applications/accepted/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test accepted - No Permission
     *
     * @return void
     */
    public function testAcceptedNoPerm()
    {
        $this->session(['Auth.User.id' => 4]);

        $this->get('/applications/accepted/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test accepted - No application
     *
     * @return void
     */
    public function testAcceptedNoApplication()
    {
        $this->session(['Auth.User.id' => 3]);
        $this->get('/applications/accepted');
        $this->assertRedirect(['controller' => 'Pages', 'action' => 'home']);
    }

    /**
     * Test accepted - Already accepted
     *
     * @return void
     */
    public function testAcceptedAlreadyAccepted()
    {
        $this->session(['Auth.User.id' => 3]);
        $this->get('/applications/accepted/2');
        $this->assertRedirect(['controller' => 'Missions', 'action' => 'view', 8]);
    }

    /**
     * Test accepted - Not the mentor
     *
     * @return void
     */
    public function testAcceptedNotMentor()
    {
        $this->session(['Auth.User.id' => 1]);
        $this->get('/applications/accepted/4');
        $this->assertRedirect(['controller' => 'Missions', 'action' => 'view', 9]);
    }

    /**
     * Test accepted - Wrong Password
     *
     * @return void
     */
    public function testAcceptedWrongPassword()
    {
        $this->session(['Auth.User.id' => 3]);

        $data = ['old_password' => 'wrong'];
        $this->post('/applications/accepted/1', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test accepted - Not the last place
     *
     * @return void
     */
    public function testAcceptedNotLast()
    {
        $this->session(['Auth.User.id' => 3]);

        $data = ['old_password' => 'toto'];
        $this->post('/applications/accepted/1', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test accepted - Last place
     *
     * @return void
     */
    public function testAcceptedLast()
    {
        $this->session(['Auth.User.id' => 3]);

        $data = ['old_password' => 'toto'];
        $this->post('/applications/accepted/4', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test view - Ok
     *
     * @return void
     */
    public function testViewOk()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/applications/view/1');
        $this->assertResponseOk();
    }

    /**
     * Test view - No Auth
     *
     * @return void
     */
    public function testViewNoAuth()
    {
        $this->get('/applications/view/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test view - No Perm
     *
     * @return void
     */
    public function testViewNoPerm()
    {
        $this->session(['Auth.User.id' => 4]);

        $this->get('/applications/view/1');
        $this->assertResponseSuccess();
    }



    /**
     * Test rejected - Ok
     *
     * @return void
     */
    public function testRejectedOk()
    {
        $this->session(['Auth.User.id' => 3]);

        $this->get('/applications/rejected/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test rejected - No Authentication
     *
     * @return void
     */
    public function testRejectedNoAuth()
    {
        $this->get('/applications/rejected/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test rejected - Not permission
     *
     * @return void
     */
    public function testRejectedNoPerm()
    {
        $this->session(['Auth.User.id' => 4]);

        $this->get('/applications/rejected/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test rejected - No application
     *
     * @return void
     */
    public function testRejectedNoApplication()
    {
        $this->session(['Auth.User.id' => 3]);
        $this->get('/applications/rejected');
        $this->assertRedirect(['controller' => 'Pages', 'action' => 'home']);
    }


    /**
     * Test rejected - Already Rejected
     *
     * @return void
     */
    public function testRejectedAlreadyRejected()
    {
        $this->session(['Auth.User.id' => 3]);
        $this->get('/applications/rejected/2');
        $this->assertRedirect(['controller' => 'Missions', 'action' => 'view', 8]);
    }

    /**
     * Test rejected - Not the mentor
     *
     * @return void
     */
    public function testRejectedNotMentor()
    {
        $this->session(['Auth.User.id' => 1]);
        $this->get('/applications/rejected/4');
        $this->assertRedirect(['controller' => 'Missions', 'action' => 'view', 9]);
    }

    /**
     * Test rejected - Wrong password
     *
     * @return void
     */
    public function testRejectedWrongPassword()
    {
        $this->session(['Auth.User.id' => 3]);

        $data = ['old_password' => 'wrong'];
        $this->post('/applications/rejected/1', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test rejected - Rejected
     *
     * @return void
     */
    public function testRejected()
    {
        $this->session(['Auth.User.id' => 3]);

        $data = ['old_password' => 'toto'];
        $this->post('/applications/rejected/4', $data);

        $this->assertResponseSuccess();
    }
}
