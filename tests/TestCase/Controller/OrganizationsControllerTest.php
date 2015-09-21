<?php
/**
 * Tests for OrganizationsController
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Controller;

use App\Controller\OrganizationsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * Tests for OrganizationsController
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class OrganizationsControllerTest extends IntegrationTestCase
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
        
        $this->get('/organizations/index');
        $this->assertResponseSuccess();
    }
    
    /**
     * Test index - No Authentification
     *
     * @return void
     */
    public function testIndexNoAuth()
    {
        $this->get('/organizations/index');
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
        
        $this->get('/organizations/view/1');
        $this->assertResponseSuccess();
    }
    
    /**
     * Test view - No Authentification
     *
     * @return void
     */
    public function testViewNoAuth()
    {
        $this->get('/organizations/view/1');
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
            'name' => 'MLL',
            'website' => 'www.website.com',
            'logo' => '/img/logo.jpg',
            'description' => 'Awesome'
        ];
        $this->post('/organizations/add', $data);

        $this->assertRedirect(['controller' => 'Organizations', 'action' => 'index']);
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
        $this->post('/organizations/add', $data);

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
        $this->post('/organizations/add', $data);

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
        $this->post('/organizations/add', $data);

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
        
        $this->get('/organizations/edit/1');
        $this->post('/organizations/edit/1', $data);
        $this->assertRedirect(['controller' => 'Organizations', 'action' => 'index']);
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
        $this->post('/organizations/edit/1', $data);
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
        $this->post('/organizations/edit/1', $data);
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test delete - Ok
     *
     * @return void
     */
    public function testDeleteOk()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
        $this->session(['Auth.User.id' => 2]);
        
        $this->post('/organizations/delete/1');
        $this->assertRedirect(['controller' => 'Organizations', 'action' => 'index']);
    }
    
    /**
     * Test delete - No Permission
     *
     * @return void
     */
    public function testDeleteNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);
        
        $this->post('/organizations/delete/1');
        $this->assertResponseSuccess();
    }
    
    /**
     * Test delete - No Authentification
     *
     * @return void
     */
    public function testDeleteNoAuth()
    {
        $this->post('/organizations/delete/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }
}
