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
use Cake\ORM\TableRegistry;
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
    'app.users',
    'app.type_users',
    'app.svn_users',
    'app.svns',
    'app.universities',
    'app.comments',
    'app.projects',
    'app.projects_contributors',
    'app.projects_mentors',
    'app.missions',
    'app.permissions',
    'app.permissions_type_users'
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
        $this->assertResponseOk();
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
            'name' => 'testOrg',
            'website' => 'http://website.com',
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
     * Test submit - Ok
     *
     * @return void
     */
    public function testSubmitOk()
    {
        $this->session(['Auth.User.id' => 2]);

        $data = [
            'name' => 'testOrgSubmit',
            'website' => 'http://website.com',
            'logo' => '/img/logo.jpg',
            'description' => 'Awesome'
        ];
        $this->post('/organizations/submit', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test submit - Fail
     *
     * @return void
     */
    public function testSubmitFail()
    {
        $this->session(['Auth.User.id' => 2]);

        $data = [];
        $this->post('/organizations/submit', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test submit - No Permission
     *
     * @return void
     */
    public function testSubmitNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);

        $data = [];
        $this->post('/organizations/submit', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test submit - No Authentification
     *
     * @return void
     */
    public function testSubmitNoAuth()
    {
        $data = [];
        $this->post('/organizations/submit', $data);

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
        $this->assertRedirect(['controller' => 'Organizations', 'action' => 'view', 1]);
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

    /**
     * Test to validate an organization - No Permission
     *
     * @return void
     */
    public function testValidatedNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->post('/organizations/editValidated/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test to validate an organization - No Authentification
     *
     * @return void
     */
    public function testtValidatedNoAuth()
    {
        $this->post('/organizations/editValidated/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test to validate an organization - Ok
     *
     * @return void
     */
    public function testtValidatedOk()
    {
        $this->session(['Auth.User.id' => 2]);

        $this->post('/organizations/editValidated/1');
        $this->assertRedirect(['controller' => 'Organizations', 'action' => 'view', 1]);
    }

    /**
     * Test to reject an organization - No Permission
     *
     * @return void
     */
    public function testRejectedNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->post('/organizations/editRejected/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test archived an organization - No Authentification
     *
     * @return void
     */
    public function testRejectedNoAuth()
    {
        $this->post('/organizations/editRejected/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test archived an organization - Ok
     *
     * @return void
     */
    public function testRejectedOk()
    {
        $this->session(['Auth.User.id' => 2]);

        $this->post('/organizations/editRejected/1');
        $this->assertRedirect(['controller' => 'Organizations', 'action' => 'view', 1]);
    }

    /**
     * Test edit state on an organization - No Permission
     *
     * @return void
     */
    public function testStatusNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->post('/organizations/editStatus/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test edit state on an organization  - No Authentification
     *
     * @return void
     */
    public function testStatusNoAuth()
    {
        $this->post('/organizations/editStatus/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test edit status approved on an organization - Not AJAX
     *
     * @return void
     */
    public function testStatusNotAjax()
    {
        $this->session(['Auth.User.id' => 2]);

        $expected = true;

        $data = [
            'id' => 1,
            'state' => 2, // Approved
            'stateValue' => $expected
        ];

        $this->post('/organizations/editStatus/1', $data);
        $this->assertRedirect(['controller' => 'Organizations', 'action' => 'index']);
    }

    /**
     * Test edit status approved on an organization - Ok
     *
     * @return void
     */
    public function testStatusAcceptOk()
    {
        $expected = true;

        $data = [
            'id' => 1,
            'state' => 2, // Approved
            'stateValue' => $expected
        ];
        $this->session(['Auth.User.id' => 2]);

        $_ENV['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';

        $this->post('/organizations/editStatus/1', $data);
        $this->assertResponseSuccess();
        unset($_ENV['HTTP_X_REQUESTED_WITH']);
        $organizations = TableRegistry::get('Organizations');

        $q = $organizations->findById(1)->first();
        $this->assertEquals($expected, $q->getIsValidated());
    }

    /**
     * Test edit state accepted on an organization - Ok
     *
     * @return void
     */
    public function testStatusRejectedOk()
    {
        $expected = true;

        $data = [
            'id' => 1,
            'state' => 3, // Rejected
            'stateValue' => $expected
        ];
        $this->session(['Auth.User.id' => 2]);

        $_ENV['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';

        $this->post('/organizations/editStatus/1', $data);
        $this->assertResponseSuccess();
        unset($_ENV['HTTP_X_REQUESTED_WITH']);
        $organizations = TableRegistry::get('Organizations');

        $q = $organizations->findById(1)->first();
        $this->assertEquals($expected, $q->getIsRejected());
    }
}
