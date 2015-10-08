<?php
/**
 * Tests for ProjectsController
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Controller;

use App\Controller\ProjectsController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * Tests for ProjectsController
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class ProjectsControllerTest extends IntegrationTestCase
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
        
        $this->get('/projects/index');
        $this->assertResponseSuccess();
    }
    
    /**
     * Test index - No Authentification
     *
     * @return void
     */
    public function testIndexNoAuth()
    {
        $this->get('/projects/index');
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
        
        $this->get('/projects/view/1');
        $this->assertResponseSuccess();
    }
    
    /**
     * Test view - No Authentification
     *
     * @return void
     */
    public function testViewNoAuth()
    {
        $this->get('/projects/view/1');
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
            'name' => 'projet1',
            'link' => 'http://website.com',
            'description' => 'bla bla',
            'accepted' => 1,
            'archived' => 1
        ];
        $this->post('/projects/add', $data);

        $this->assertRedirect(['controller' => 'Projects', 'action' => 'index']);
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
        $this->post('/projects/add', $data);

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
        $this->post('/projects/add', $data);

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
        $this->post('/projects/add', $data);

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
        
        $this->get('/projects/edit/1');
        $this->post('/projects/edit/1', $data);
        $this->assertRedirect(['controller' => 'Projects', 'action' => 'view', 1]);
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
        $this->post('/projects/edit/1', $data);
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
        $this->post('/projects/edit/1', $data);
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
        
        $this->post('/projects/delete/1');
        $this->assertRedirect(['controller' => 'Projects', 'action' => 'index']);
    }
    
    /**
     * Test delete - No Permission
     *
     * @return void
     */
    public function testDeleteNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);
        
        $this->post('/projects/delete/1');
        $this->assertResponseSuccess();
    }
    
    /**
     * Test delete - No Authentification
     *
     * @return void
     */
    public function testDeleteNoAuth()
    {
        $this->post('/projects/delete/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test accept a project - No Permission
     *
     * @return void
     */
    public function testAcceptedNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->post('/projects/editAccepted/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test accept a project - No Authentification
     *
     * @return void
     */
    public function testAcceptNoAuth()
    {
        $this->post('/projects/editAccepted/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test accept a project - Ok
     *
     * @return void
     */
    public function testAcceptOk()
    {
        $this->session(['Auth.User.id' => 2]);

        $this->post('/projects/editAccepted/1');
        $this->assertRedirect(['controller' => 'Projects', 'action' => 'view', 1]);
    }

    /**
     * Test archived a project - No Permission
     *
     * @return void
     */
    public function testArchivedNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->post('/projects/editArchived/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test archived a project - No Authentification
     *
     * @return void
     */
    public function testArchivedNoAuth()
    {
        $this->post('/projects/editArchived/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test archived a project - Ok
     *
     * @return void
     */
    public function testArchivedOk()
    {
        $this->session(['Auth.User.id' => 2]);

        $this->post('/projects/editArchived/1');
        $this->assertRedirect(['controller' => 'Projects', 'action' => 'view', 1]);
    }

    /**
     * Test edit state on a project - No Permission
     *
     * @return void
     */
    public function testStateNoPerm()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->post('/projects/editState/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test edit state on a project - No Authentification
     *
     * @return void
     */
    public function testStateNoAuth()
    {
        $this->post('/projects/editState/3');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test edit state on a project - Not AJAX
     *
     * @return void
     */
    public function testStateNotAjax()
    {
        $this->session(['Auth.User.id' => 2]);

        $expected = true;

        $data = [
            'id' => 3,
            'state' => 3, // Approved
            'stateValue' => $expected
        ];

        $this->post('/projects/editState/3', $data);
        $this->assertRedirect(['controller' => 'Projects', 'action' => 'index']);
    }

    /**
     * Test edit state archived on a project - Ok
     *
     * @return void
     */
    public function testStateAcceptOk()
    {
        $expected = true;

        $data = [
            'id' => 3,
            'state' => 3, // Approved
            'stateValue' => $expected
        ];
        $this->session(['Auth.User.id' => 2]);

        $_ENV['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';

        $this->post('/projects/editState/3', $data);
        $this->assertResponseSuccess();
        unset($_ENV['HTTP_X_REQUESTED_WITH']);
        $projects = TableRegistry::get('Projects');

        $q = $projects->findById(3)->first();
        $this->assertEquals($expected, $q->isAccepted());
    }

    /**
     * Test edit state accepted on a project - Ok
     *
     * @return void
     */
    public function testStateArchivedOk()
    {
        $expected = true;

        $data = [
            'id' => 3,
            'state' => 4, // Archived
            'stateValue' => $expected
        ];
        $this->session(['Auth.User.id' => 2]);

        $_ENV['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';

        $this->post('/projects/editState/3', $data);
        $this->assertResponseSuccess();
        unset($_ENV['HTTP_X_REQUESTED_WITH']);
        $projects = TableRegistry::get('Projects');

        $q = $projects->findById(3)->first();
        $this->assertEquals($expected, $q->isArchived());
    }
    
    /**
     * Test submit project - OK
     *
     * @return void
     */
    public function testSubmitProjectOk()
    {
        $data = [
            'name' => 'test2',
            'link' => 'http://website.com',
            'description' => 'bla bla',
            'accepted' => 0,
            'archived' => 0
        ];
        
        $this->session(['Auth.User.id' => 2]);
        
        $this->post('/projects/submit', $data);

        $this->assertRedirect(['controller' => 'Projects', 'action' => 'index']);
    }
    
    /**
     * Test submit project - Fail
     *
     * @return void
     */
    public function testSubmitProjectFail()
    {
        $data = [
            'name' => 'test3',
            'link' => '',
            'description' => ''
        ];
        
        $this->session(['Auth.User.id' => 2]);
        
        $this->post('/projects/submit', $data);

        $this->assertResponseSuccess();
    }
    
    /**
     * Test submit project - No authentification
     *
     * @return void
     */
    public function testSubmitProjectNoAuth()
    {
        $this->post('/projects/submit');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }
}
