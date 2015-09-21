<?php
/**
 * Tests for SvnUsersController
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Controller;

use App\Controller\SvnUsersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * Tests for SvnUsersController
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class SvnUsersControllerTest extends IntegrationTestCase
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
    'app.projects_users_missions',
    'app.users',
        'app.type_users',
    'app.svn_users',
    'app.svns',
        'app.universities',
        'app.comments',
        'app.projects',
        'app.projects_users',
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
        
        $this->get('/svnUsers/index');
        $this->assertResponseSuccess();
    }
    
    /**
     * Test index - No Authentification
     *
     * @return void
     */
    public function testIndexNoAuth()
    {
        $this->get('/svnUsers/index');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test view - Ok
     *
     * @return void
     */
    public function testViewOk()
    {
        $this->session(['Auth.User.id' => 2]);
        
        $this->get('/svnUsers/view/1');
        $this->assertResponseSuccess();
    }
    
    /**
     * Test view - No Authentification
     *
     * @return void
     */
    public function testViewNoAuth()
    {
        $this->get('/svnUsers/view/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
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
            'pseudo' => 'mradd',
            'svn_id' => 1,
            'user_id' => 1
        ];
        $this->post('/svnUsers/add', $data);

        $this->assertRedirect(['controller' => 'SvnUsers', 'action' => 'index']);
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
        $this->post('/svnUsers/add', $data);

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
        $this->post('/svnUsers/add', $data);

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
        $this->post('/svnUsers/add', $data);

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test edit - Ok
     *
     * @return void
     */
    public function testEditOk()
    {
        $this->session(['Auth.User.id' => 2]);
        
        $data = [];
        
        $this->get('/svnUsers/edit/1');
        $this->post('/svnUsers/edit/1', $data);
        $this->assertRedirect(['controller' => 'SvnUsers', 'action' => 'index']);
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
        $this->post('/svnUsers/edit/1', $data);
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
        $this->post('/svnUsers/edit/1', $data);
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
        
        $this->post('/svnUsers/delete/1');
        $this->assertRedirect(['controller' => 'SvnUsers', 'action' => 'index']);
    }
    
    /**
     * Test delete - No Permission
     *
     * @return void
     */
    public function testDeleteNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);
        
        $this->post('/svnUsers/delete/1');
        $this->assertResponseSuccess();
    }
    
    /**
     * Test delete - No Authentification
     *
     * @return void
     */
    public function testDeleteNoAuth()
    {
        $this->post('/svnUsers/delete/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }
}
