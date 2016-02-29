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
        'app.organizations_owners',
        'app.organizations_members',
        'app.users',
        'app.type_users',
        'app.svn_users',
        'app.svns',
        'app.universities',
        'app.projects',
        'app.projects_contributors',
        'app.projects_mentors',
        'app.missions',
        'app.permissions',
        'app.permissions_type_users',
        'app.hashes',
        'app.hash_types',
        'app.users_type_missions',
        'app.type_missions',
        'app.notifications',
        'app.applications',
        'app.news',
        'app.visits'
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersTypeMissions') ? [] : ['className' => 'App\Model\Table\UsersTypeMissionsTable'];
        $this->UsersTypeMissions = TableRegistry::get('UsersTypeMissions', $config);

        $config = TableRegistry::exists('Users') ? [] : ['className' => 'App\Model\Table\UsersTable'];
        $this->Users = TableRegistry::get('Users', $config);

        $config = TableRegistry::exists('Visits') ? [] : ['className' => 'App\Model\Table\VisitsTable'];
        $this->Visits = TableRegistry::get('Visits', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersTypeMissions);
        unset($this->Users);
        unset($this->Visits);

        parent::tearDown();
    }

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
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test login - From Register
     *
     * @return void
     */
    public function testLoginFromRegister()
    {
        $this->session(['actionRef' => 'register/']);

        $data = [
            'username' => 'admin',
            'password' => 'admin',
        ];

        $this->post('/users/login', $data);

        $this->assertRedirect(['controller' => 'Users', 'action' => 'view/2']);
    }

    /**
     * Test login - Ok
     *
     * @return void
     */
    public function testLoginOk()
    {
        $this->session(['controllerRef' => 'Pages']);
        $this->session(['actionRef' => 'home']);

        $data = [
            'username' => 'admin',
            'password' => 'admin',
        ];

        $this->post('/users/login', $data);

        $this->assertRedirect(['controller' => 'Pages', 'action' => 'home']);

        $visits = $this->Visits->find('all')->where(['user_id' => 2])->count();

        $this->assertEquals(1, $visits);
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
     * Test register - Ok
     *
     * @return void
     */
    public function testRegisterOk()
    {
        $expectedEmail = 'bla@bla.com';
        $data = [
            'username' => 'mrregister',
            'password' => 'allo',
            'confirm_password' => 'allo',
            'email' => $expectedEmail,
            'confirm_email' => 'bla@bla.com',
            'university_id' => 1
        ];
        $this->post('/users/register', $data);

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);

        $user = $this->Users->find()->select(['emailPublic'])->order(['id' => 'DESC'])->first();

        $this->assertEquals($expectedEmail, $user->getEmailPublic());
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
        $this->assertResponseContains('Vos informations sont invalides. Veuillez recommencer plus tard et nous contacter si le problème persiste.');
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
            'password_confirm' => 'allo',
        ];
        $this->get('/users/password/3');
        $this->post('/users/password/3', $data);
        $this->assertRedirect(['controller' => 'Users', 'action' => 'view', 3]);
    }

    /**
     * Test password - Wrong Old Password
     *
     * @return void
     */
    public function testPasswordWrongOldPassword()
    {
        $this->session(['Auth.User.id' => 3]);

        $data = [
            'old_password' => 'rrrrrrr',
            'password' => 'allo',
            'password_confirm' => 'tr',
        ];
        $this->get('/users/password/3');
        $this->post('/users/password/3', $data);
        $this->assertResponseSuccess();
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
    public function testEditNullGender()
    {
        $this->session(['Auth.User.id' => 2]);
        $expectedGender = null;

        $data = [];

        $this->post('/users/edit/2', $data);

        $this->assertRedirect(['controller' => 'Users', 'action' => 'view', 2]);

        $user = $this->Users->get(2);

        $this->assertEquals($expectedGender, $user->getGender);
    }


    /**
     * Test edit - Add new typeMission
     *
     * @return void
     */
    public function testEditNewTypeMission()
    {
        $this->session(['Auth.User.id' => 1]);
        $data = [
            'type_missions' => [
                '_ids' => [1, 2]
            ]
        ];
        $this->post('/users/edit/1', $data);
        $this->assertRedirect(['controller' => 'Users', 'action' => 'view', 1]);

        $selectedTypeMissions = $this->UsersTypeMissions->findByUserId(1)->toArray();

        //Get an array of ids
        $returnIds = function ($typeMission) {
            return $typeMission['id'];
        };
        $ids = array_map($returnIds, $selectedTypeMissions);

        $this->assertContains(2, $ids);
    }


    /**
     * Test edit Skill - Not ok
     *
     * @return void
     */
    public function testEditSkillNotOk()
    {
        $this->session(['Auth.User.id' => 2]);
        $data = [
            'skills' => ';lfjgh'
        ];
        $this->post('/users/edit/2', $data);
        $this->assertResponseSuccess();
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
        $this->assertRedirect('/pages/home');
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
        $this->assertRedirect('/pages/home');
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

    /**
     * Test recoverPassword - no account found
     *
     * @return void
     */
    public function testRecoverPasswordFail()
    {
        $this->get('/users/recoverPassword/');
        $data = ['Information' => 'gezcezdzacdcazdz'];
        $this->post('/users/recoverPassword/', $data);
        $this->assertResponseOk();
    }

    /**
     * Test recoverPassword - account found by email
     *
     * @return void
     */
    public function testRecoverPasswordByEmail()
    {
        $this->get('/users/recoverPassword/');
        $data = ['Information' => 'email@gmail.com'];
        $this->post('/users/recoverPassword/', $data);
        $this->assertResponseOk();
    }

    /**
     * Test recoverPassword - account found by username
     *
     * @return void
     */
    public function testRecoverPasswordByUsername()
    {
        $this->get('/users/recoverPassword/');
        $data = ['Information' => 'tropHot'];
        $this->post('/users/recoverPassword/', $data);
        $this->assertResponseOk();
    }

    /**
     * Test recoverPassword - account found by phone
     *
     * @return void
     */
    public function testRecoverPasswordByPhone()
    {
        $this->get('/users/recoverPassword/');
        $data = ['Information' => '(514) 777-7777'];
        $this->post('/users/recoverPassword/', $data);
        $this->assertResponseOk();
    }

    /**
     * Test recoverPassword - send Mail
     *
     * @return void
     */
    public function testRecoverPasswordSendMail()
    {
        $this->get('/users/recoverPassword/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'recoverPassword']);
    }

    /**
     * Test resetPassword - Ok
     *
     * @return void
     */
    public function testResetPasswordOk()
    {
        $this->get('/users/resetPassword/toto');
        $data = ['password' => 'tutu', 'confirm_password' => 'tutu'];
        $this->post('/users/resetPassword/toto', $data);
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test resetPassword - Expired
     *
     * @return void
     */
    public function testResetPasswordExpired()
    {
        $this->get('/users/resetPassword/tutu');
        $this->assertRedirect(['controller' => 'Pages', 'action' => 'home']);
    }

    /**
     * Test resetPassword - Used
     *
     * @return void
     */
    public function testResetPasswordUsed()
    {
        $this->get('/users/resetPassword/titi');
        $this->assertRedirect(['controller' => 'Pages', 'action' => 'home']);
    }

    /**
     * Test resetPassword - Not exist
     *
     * @return void
     */
    public function testResetPasswordNotExist()
    {
        $this->get('/users/resetPassword/hashWhoNotExist');
        $this->assertRedirect(['controller' => 'Pages', 'action' => 'home']);
    }

    /**
     * Test resetPassword - wrong type
     *
     * @return void
     */
    public function testResetPasswordWrongType()
    {
        $this->get('/users/resetPassword/tata');
        $this->assertRedirect(['controller' => 'Pages', 'action' => 'home']);
    }

    /**
     * Test svn - OK
     *
     * @return void
     */
    public function testSvnOK()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/users/svn/1');
        $this->assertResponseOk();
    }

    /**
     * Test svn - Code
     *
     * @return void
     */
    public function testSvnCode()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/users/svn/1?code=1323141412412');
        $this->assertResponseOk();
    }

    /**
     * Test svn - No Auth
     *
     * @return void
     */
    public function testSvnNoAuth()
    {
        $this->post('/users/svn/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test svnCallBack - OK
     *
     * @return void
     */
    public function testSvnCallbackOK()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/users/svnCallBack?code=1212312312');
        $this->assertResponseSuccess();
        $this->assertRedirect('/users/svn/1?code=1212312312');
    }

    /**
     * Test svnRemove - OK
     *
     * @return void
     */
    public function testSvnRemoveOK()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/users/svnRemove/1?pseudo=pseudo');
        $this->assertResponseSuccess();
    }
}
