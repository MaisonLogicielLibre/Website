<?php
/**
 * Tests for MissionsController
 *
 * @category Test
 * @package  Website
 * @author   Simon Begin <ak36250@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Test\TestCase\Controller;

use App\Controller\MissionsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * Tests for MissionsController
 *
 * @category Test
 * @package  Website
 * @author   Simon Begin <ak36250@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class MissionsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.missions',
        'app.projects',
        'app.applications',
        'app.users',
        'app.universities',
        'app.comments',
        'app.projects_contributors',
        'app.organizations',
        'app.organizations_owners',
        'app.organizations_members',
        'app.organizations_projects',
        'app.projects_mentors',
        'app.type_users',
        'app.permissions',
        'app.permissions_type_users',
        'app.type_users_users',
        'app.mission_levels',
        'app.missions_mission_levels',
        'app.type_missions',
        'app.missions_type_missions'
    ];

    /**
     * Test view - Ok
     *
     * @return void
     */
    public function testViewOk()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/missions/view/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test view - Ok no user
     *
     * @return void
     */
    public function testViewOkNoUser()
    {
        $this->get('/missions/view/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test add - Ok
     *
     * @return void
     */
    public function testAddOk()
    {
        $this->session(['Auth.User.id' => 1]);

        $data = [
            'id' => 3,
            'name' => 'Dev',
            'session' => 3,
            'length' => 3,
            'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'competence' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'internNbr' => 1,
            'project_id' => 1,
            'mentor_id' => 1,
            'type_missions' => ['_ids' => 1],
            'mission_levels' => ['_ids' => 1],
            'created' => '2015-10-20 15:10:06',
            'modified' => '2015-10-20 15:10:06'
        ];
        $this->post('/missions/add/1', $data);

        $this->assertRedirect(['controller' => 'Projects', 'action' => 'view', 1]);
    }
    
    /**
     * Test add - Get
     *
     * @return void
     */
    public function testAddGet()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/missions/add/1');

        $this->assertResponseSuccess();
    }

    /**
     * Test add - Ok
     *
     * @return void
     */
    public function testAddFailValidation()
    {
        $this->session(['Auth.User.id' => 2]);

        $data = [
            'id' => 3,
            'name' => 'Dev',
            'session' => 3,
            'length' => 3,
            'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'competence' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'internNbr' => 0,
            'project_id' => 1,
            'mentor_id' => 1,
            'type_missions' => ['_ids' => 1],
            'mission_levels' => ['_ids' => 1],
            'created' => '2015-10-20 15:10:06',
            'modified' => '2015-10-20 15:10:06'
        ];
        $this->post('/missions/add/1', $data);

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
        $this->post('/missions/add/1', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test add - No Permission
     *
     * @return void
     */
    public function testAddNoPerm()
    {
        $this->session(['Auth.User.id' => 3]);

        $data = [];
        $this->post('/missions/add/1', $data);

        $this->assertRedirect(['controller' => 'Projects', 'action' => 'index']);
    }
    /**
     * Test add - Ok
     *
     * @return void
     */
    public function testAddNoProject()
    {
        $this->session(['Auth.User.id' => 2]);

        $data = [];
        $this->post('/missions/add/', $data);

        $this->assertRedirect(['controller' => 'Projects', 'action' => 'index']);
    }


    /**
     * Test add - No Authentification
     *
     * @return void
     */
    public function testAddNoAuth()
    {
        $data = [];
        $this->post('/missions/add/1', $data);

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test edit - Ok
     *
     * @return void
     */
    public function testEditOk()
    {
        $this->session(['Auth.User.id' => 1]);

        $data = [];

        $this->get('/missions/edit/1');
        $this->post('/missions/edit/1', $data);
        $this->assertRedirect(['controller' => 'Missions', 'action' => 'view', 1]);
    }

    /**
     * Test edit - No Permission
     *
     * @return void
     */
    public function testEditNoPerm()
    {
        $this->session(['Auth.User.id' => 2]);

        $data = [];
        $this->post('/missions/edit/1', $data);
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
        $this->post('/missions/edit/1', $data);
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test archived a mission - No Permission
     *
     * @return void
     */
    public function testArchivedNoPerm()
    {
        $this->session(['Auth.User.id' => 2]);

        $this->post('/missions/editArchived/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test archived a mission - No Authentification
     *
     * @return void
     */
    public function testArchivedNoAuth()
    {
        $this->post('/missions/editArchived/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test archived a mission - Ok
     *
     * @return void
     */
    public function testArchivedOk()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->post('/missions/editArchived/1');
        $this->post('/missions/editArchived/1');
        $this->assertRedirect(['controller' => 'Missions', 'action' => 'view', 1]);
    }

    /**
     * Test restore a mission - Ok
     *
     * @return void
     */
    public function testRestoreOk()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->post('/missions/editArchived/7');
        $this->assertRedirect(['controller' => 'Missions', 'action' => 'view', 7]);
    }
    
    /**
     * Test apply - Ok
     *
     * @return void
     */
    public function testApplyOk()
    {
        $this->session(['Auth.User.id' => 2]);

        $this->post('/missions/apply/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test apply - No more place
     *
     * @return void
     */
    public function testApplyNoMorePlaces()
    {
        $this->session(['Auth.User.id' => 1]);
        $this->post('/missions/apply/10');

        $this->assertRedirect(['controller' => 'Missions', 'action' => 'view', 10]);
    }

    /**
     * Test apply - Get
     *
     * @return void
     */
    public function testApplyGet()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/missions/apply/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test apply - Get
     *
     * @return void
     */
    public function testApplyAlreadyApply()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->post('/missions/apply/8');
        $this->assertRedirect(['controller' => 'Missions', 'action' => 'view', 8]);
    }
    
    /**
     * Test apply - No Authentification
     *
     * @return void
     */
    public function testApplyNoAuth()
    {
        $this->get('/missions/apply/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test edit mission - Empty
     *
     * @return void
     */
    public function testEditMentorEmpty()
    {
        $data = [];
        
        $this->session(['Auth.User.id' => 1]);
        
        $this->post('/missions/editMentor/1', $data);

        $this->assertResponseSuccess();
    }
    
    /**
     * Test edit mentor of a mission - Get
     *
     * @return void
     */
    public function testEditMentorGet()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/missions/editMentor/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test edit mentor of a mission - No permission
     *
     * @return void
     */
    public function testEditMentorNoPerm()
    {
        $this->session(['Auth.User.id' => 2]);

        $this->post('/missions/editMentor/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test edit mentor of a mission - No authentification
     *
     * @return void
     */
    public function testEditMentorNoAuth()
    {
        $this->post('/missions/editMentor/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test edit mission - Empty
     *
     * @return void
     */
    public function testEditProfessorEmpty()
    {
        $data = [];

        $this->session(['Auth.User.id' => 1]);

        $this->post('/missions/editProfessor/1', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test edit professor of a mission - Get
     *
     * @return void
     */
    public function testEditProfessorGet()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/missions/editProfessor/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test edit professor of a mission - No permission
     *
     * @return void
     */
    public function testEditProfessorNoPerm()
    {
        $this->session(['Auth.User.id' => 2]);

        $this->post('/missions/editProfessor/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test edit professor of a mission - No authentification
     *
     * @return void
     */
    public function testEditProfessorNoAuth()
    {
        $this->post('/missions/editProfessor/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }
}
