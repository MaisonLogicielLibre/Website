<?php
/**
 * Tests for MeetupsController
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Controller;

use App\Controller\MeetupsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * Tests for MeetupsController
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class MeetupsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.meetups',
        'app.notifications',
        'app.users',
        'app.type_users',
        'app.type_users_users',
        'app.projects_mentors',
        'app.projects',
        'app.organizations_owners',
        'app.organizations',
        'app.organizations_members',
        'app.permissions_type_users',
        'app.permissions'
    ];

    /**
     * Test index - Ok
     *
     * @return void
     */
    public function testIndexOk()
    {
        $this->session(['Auth.User.id' => 2]);

        $this->get('/meetups/index');
        $this->assertResponseSuccess();
    }

    /**
     * Test index - No Authentification
     *
     * @return void
     */
    public function testAcceptedNoAuth()
    {
        $this->get('/meetups/index');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test index - No Permission
     *
     * @return void
     */
    public function testAcceptedNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/meetups/index');
        $this->assertResponseSuccess();
    }

    /**
     * Test add - Ok
     *
     * @return void
     */
    public function testAddOk()
    {
        $this->session(['Auth.User.id' => 2]);

        $data = [
            'name' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'date' => '2015-11-26 20:26:55',
            'link' => 'Lorem ipsum dolor sit amet'
        ];
        $this->get('/meetups/add');
        $this->post('/meetups/add', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test add - Fail
     *
     * @return void
     */
    public function testAddFail()
    {
        $this->session(['Auth.User.id' => 2]);

        $data = [];
        $this->post('/meetups/add', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test add - No Permission
     *
     * @return void
     */
    public function testAddNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);

        $data = [];
        $this->post('/meetups/add', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test add - No Authentification
     *
     * @return void
     */
    public function testAddNoAuth()
    {
        $data = [];
        $this->post('/meetups/add', $data);

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test add - Ok
     *
     * @return void
     */
    public function testEditOk()
    {
        $this->session(['Auth.User.id' => 2]);

        $data = [
            'name' => 'New news',
        ];
        $this->get('/meetups/edit/1');
        $this->post('/meetups/edit/1', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test add - No Permission
     *
     * @return void
     */
    public function testEditNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);

        $data = [];
        $this->post('/meetups/edit', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test add - No Authentification
     *
     * @return void
     */
    public function testEditNoAuth()
    {
        $data = [];
        $this->post('/meetups/edit', $data);

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test delete - Ok
     *
     * @return void
     */
    public function testDeleteOk()
    {
        $this->session(['Auth.User.id' => 2]);

        $this->delete('/meetups/delete/1');

        $this->assertResponseSuccess();
    }

    /**
     * Test delete - No Permission
     *
     * @return void
     */
    public function testDeleteNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->delete('/meetups/delete/1');

        $this->assertResponseSuccess();
    }

    /**
     * Test delete - No Authentification
     *
     * @return void
     */
    public function testDeleteNoAuth()
    {
        $this->delete('/meetups/delete/1');

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }
}
