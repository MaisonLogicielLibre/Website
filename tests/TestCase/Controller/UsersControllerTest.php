<?php
/**
 * Tests for UsersController
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\Auth;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * Tests for UsersController
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class UsersControllerTest extends IntegrationTestCase
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
     * Test index - Ok
     *
     * @return void
     */
    public function testIndexOk()
    {
        $this->session(['Auth.User.id' => 2]);

        $this->get('/users/index');
        $this->assertResponseSuccess();
    }

    /**
     * Test index - No Authentification
     *
     * @return void
     */
    public function testIndexNoAuth()
    {
        $this->get('/users/index');
        $this->assertResponseOk();
    }
    
    /**
     * Test login - From Register
     *
     * @return void
     */
    public function testLoginFromRegister()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
        $this->session(['actionRef' => 'register/']);
        
        $data = [
            'username' => 'admin2',
            'password' => '$2y$10$6DYQvHVFPlT06jcE7UbRfeFSkBt2zdMjnk8nMDnVQDUI32819Y5O.',
        ];
        
        $this->post('/users/login', $data);
        
        $this->assertRedirect(['controller' => 'Users', 'action' => 'view/3']);
    }

    /**
     * Test login - Ok
     *
     * @return void
     */
    public function testLoginOk()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
        $this->session(['controllerRef' => 'Pages']);
        $this->session(['actionRef' => 'home']);
        
        $data = [
            'username' => 'admin2',
            'password' => '$2y$10$6DYQvHVFPlT06jcE7UbRfeFSkBt2zdMjnk8nMDnVQDUI32819Y5O.',
        ];
        
        $this->post('/users/login', $data);
        
        $this->assertRedirect(['controller' => 'Pages', 'action' => 'home']);
    }

    /**
     * Test login - Fail
     *
     * @return void
     */
    public function testLoginFail()
    {
        $data = [];
        $this->post('/users/login', $data);
        $this->assertResponseOk();
    }

    /**
     * Test logout
     *
     * @return void
     */
    public function testLogout()
    {
        $this->get('/users/logout');
        $this->assertResponseSuccess();
    }

    /**
     * Test view - Ok
     *
     * @return void
     */
    public function testViewOk()
    {
        $this->session(['Auth.User.id' => 2]);

        $this->get('/users/view/2');
        $this->assertResponseSuccess();
    }

    /**
     * Test view - No Authentification
     *
     * @return void
     */
    public function testViewNoAuth()
    {
        $this->get('/users/view/2');
        $this->assertResponseOk();
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
            'username' => 'mradd',
            'password' => 'allo',
            'confirm_password' => 'allo',
            'firstName' => 'joe',
            'lastName' => 'test',
            'biography' => 'bla',
            'portfolio' => 'http://bla.com',
            'email' => 'bla@bla.com',
            'confirm_email' => 'bla@bla.com',
            'phone' => '555-555-5555',
            'gender' => 1,
            'university' => 1,
        ];
        $this->post('/users/add', $data);

        $this->assertRedirect(['controller' => 'Users', 'action' => 'index']);
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
        $this->post('/users/add', $data);

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
        $this->post('/users/add', $data);

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
        $this->post('/users/add', $data);

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test register - Ok
     *
     * @return void
     */
    public function testRegisterOk()
    {
        $data = [
            'username' => 'mrregister',
            'password' => 'allo',
            'confirm_password' => 'allo',
            'email' => 'bla@bla.com',
            'confirm_email' => 'bla@bla.com',
        ];
        $this->post('/users/register', $data);

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }


    /**
     * Test register - Fail
     *
     * @return void
     */
    public function testRegisterFail()
    {
        $data = [
            'password' => 'allo'
        ];
        $this->post('/users/register', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test password - Ok
     *
     * @return void
     */
    public function testPasswordOk()
    {
        $this->session(['Auth.User.id' => 3]);

        $data = [
            'old_password' => 'toto',
            'password' => 'allo',
            'password_email' => 'allo',
        ];
        $this->get('/users/password/3');
        $this->post('/users/password/3', $data);
        $this->assertRedirect(['controller' => 'Users', 'action' => 'view', 3]);
    }

    /**
     * Test password - No Permission
     *
     * @return void
     */
    public function testPasswordNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);

        $data = [];
        $this->post('/users/password/2', $data);
        $this->assertResponseSuccess();
    }


    /**
     * Test password - Not post
     *
     * @return void
     */
    public function testPasswordNotPost()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/users/password/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test Password - No Authentification
     *
     * @return void
     */
    public function testPasswordNoAuth()
    {
        $data = [];
        $this->post('/users/password/2', $data);
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }
    
    /**
     * Test email - Ok
     *
     * @return void
     */
    public function testEmailOk()
    {
        $this->session(['Auth.User.id' => 3]);

        $data = [
            'old_password' => 'toto',
            'email' => 'blabla@bla.com',
            'confirm_email' => 'blabla@bla.com',
        ];
        $this->get('/users/email/3');
        $this->post('/users/email/3', $data);
        $this->assertRedirect(['controller' => 'Users', 'action' => 'view', 3]);
    }

    /**
     * Test email - No Permission
     *
     * @return void
     */
    public function testEmailNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);

        $data = [];
        $this->post('/users/email/2', $data);
        $this->assertResponseSuccess();
    }

    /**
     * Test email - Not post
     *
     * @return void
     */
    public function testEmailNotPost()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/users/email/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test email - No Authentification
     *
     * @return void
     */
    public function testEmailNoAuth()
    {
        $data = [];
        $this->post('/users/email/2', $data);
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test edit - Test Get
     *
     * @return void
     */
    public function testEditGet()
    {
        $this->session(['Auth.User.id' => 1]);
        $this->get('/users/edit/1');

        $this->assertResponseSuccess();
    }

    /**
     * Test edit - Ok
     *
     * @return void
     */
    public function testEditOk()
    {
        $this->session(['Auth.User.id' => 2]);
        $data = [
        ];
        $this->get('/users/edit/1');
        $this->post('/users/edit/2', $data);
        $this->assertRedirect(['controller' => 'Users', 'action' => 'view', 2]);
    }

    /**
     * Test edit - No Permission
     *
     * @return void
     */
    public function testEditNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);

        $data = [];
        $this->post('/users/edit/2', $data);
        $this->assertResponseSuccess();
    }

    /**
     * Test edit - No Authentification
     *
     * @return void
     */
    public function testEditNoAuth()
    {
        $data = [];
        $this->post('/users/edit/2', $data);
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test delete - Ok
     *
     * @return void
     */
    public function testDeleteOkForYou()
    {
        $this->session(['Auth.User.id' => 1]);
        $this->get('/users/delete/1');
        $this->post('/users/delete/1');
        $this->assertRedirect('/');
    }

    /**
     * Test delete - Ok
     *
     * @return void
     */
    public function testDeleteOkForAdministrator()
    {
        $this->session(['Auth.User.id' => 2]);
        $this->get('/users/delete/1');
        $this->post('/users/delete/1');
        $this->assertRedirect('/');
    }

    /**
     * Test delete - Ok
     *
     * @return void
     */
    public function testDeleteOkForOther()
    {
        $this->session(['Auth.User.id' => 1]);
        $this->get('/users/delete/2');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'delete', 1]);
        $this->post('/users/delete/2');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'delete', 1]);
    }

    /**
     * Test delete - No Permission
     *
     * @return void
     */
    public function testDeleteNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->post('/users/delete/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test delete - No Authentification
     *
     * @return void
     */
    public function testDeleteNoAuth()
    {
        $this->post('/users/delete/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }
}
