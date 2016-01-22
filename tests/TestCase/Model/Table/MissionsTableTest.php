<?php
/**
 * Test for MissionsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MissionsTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for MissionsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class MissionsTableTest extends TestCase
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
        'app.organizations_projects',
        'app.projects_mentors',
        'app.type_users',
        'app.permissions',
        'app.permissions_type_users',
        'app.type_users_users',
        'app.mission_levels',
        'app.missions_mission_levels',
        'app.type_missions'
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Missions') ? [] : ['className' => 'App\Model\Table\MissionsTable'];
        $this->Missions = TableRegistry::get('Missions', $config);
        $config = TableRegistry::exists('Projects') ? [] : ['className' => 'App\Model\Table\ProjectsTable'];
        $this->Projects = TableRegistry::get('Projects', $config);
        $config = TableRegistry::exists('MissionLevels') ? [] : ['className' => 'App\Model\Table\MissionLevelsTable'];
        $this->Levels = TableRegistry::get('MissionLevels', $config);
        $config = TableRegistry::exists('TypeMissions') ? [] : ['className' => 'App\Model\Table\TypeMissionsTable'];
        $this->Type = TableRegistry::get('TypeMissions', $config);
        $config = TableRegistry::exists('Users') ? [] : ['className' => 'App\Model\Table\UsersTable'];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Missions);

        parent::tearDown();
    }

    /**
     * Test getName
     *
     * @return void
     */
    public function testGetName()
    {
        $id = 1;
        $expected = 'Intern';

        $mission = $this->Missions->get($id);

        $result = $mission->getName();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getProjectId
     *
     * @return void
     */
    public function testGetProjectId()
    {
        $id = 1;
        $expected = 1;

        $mission = $this->Missions->get($id);

        $result = $mission->getProjectId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getMentorId
     *
     * @return void
     */
    public function testGetMentorId()
    {
        $id = 1;
        $expected = 1;

        $mission = $this->Missions->get($id);

        $result = $mission->getMentorId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getProfessorId
     *
     * @return void
     */
    public function testGetProfessorId()
    {
        $id = 1;
        $expected = 1;

        $mission = $this->Missions->get($id);

        $result = $mission->getProfessorId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getProject
     *
     * @return void
     */
    public function testGetProject()
    {
        $id = 1;

        $expected = $this->Projects->get(1);

        $mission = $this->Missions->get($id, ['contain' => 'Projects']);

        $result = $mission->getProject();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getDescription
     *
     * @return void
     */
    public function testGetDescription()
    {
        $id = 1;
        $expected = 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.';

        $mission = $this->Missions->get($id);

        $result = $mission->getDescription();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getCompetence
     *
     * @return void
     */
    public function testGetCompetence()
    {
        $id = 1;
        $expected = 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.';

        $mission = $this->Missions->get($id);

        $result = $mission->getCompetence();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getInternNbr
     *
     * @return void
     */
    public function testGetInternNbr()
    {
        $id = 1;
        $expected = 1;

        $mission = $this->Missions->get($id);

        $result = $mission->getInternNbr();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getSession1
     *
     * @return void
     */
    public function testGetSession1()
    {
        $id = 1;
        $expected = __('Winter');

        $mission = $this->Missions->get($id);

        $result = $mission->getSession();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getSession2
     *
     * @return void
     */
    public function testGetSession2()
    {
        $id = 2;
        $expected = __('Summer');

        $mission = $this->Missions->get($id);

        $result = $mission->getSession();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getSession3
     *
     * @return void
     */
    public function testGetSession3()
    {
        $id = 3;
        $expected = __('Fall');

        $mission = $this->Missions->get($id);

        $result = $mission->getSession();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getSession4
     *
     * @return void
     */
    public function testGetSession4()
    {
        $id = 4;
        $expected = __('Not specified');

        $mission = $this->Missions->get($id);

        $result = $mission->getSession();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getLength1
     *
     * @return void
     */
    public function testGetLength1()
    {
        $id = 1;
        $expected = __('1 term');

        $mission = $this->Missions->get($id);

        $result = $mission->getLength();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getLength2
     *
     * @return void
     */
    public function testGetLength2()
    {
        $id = 2;
        $expected = __('2 terms');

        $mission = $this->Missions->get($id);

        $result = $mission->getLength();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getLength3
     *
     * @return void
     */
    public function testGetLength3()
    {
        $id = 3;
        $expected = __('3 terms');

        $mission = $this->Missions->get($id);

        $result = $mission->getLength();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getLength4
     *
     * @return void
     */
    public function testGetLength4()
    {
        $id = 4;
        $expected = __('Not specified');

        $mission = $this->Missions->get($id);

        $result = $mission->getLength();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getLevels
     *
     * @return void
     */
    public function testGetLevels()
    {
        $id = 1;

        $expected = $this->Levels->get(1)->getName();

        $mission = $this->Missions->get($id, ['contain' => 'MissionLevels']);

        $result = $mission->getLevels()[0]->getName();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getType
     *
     * @return void
     */
    public function testGetType()
    {
        $id = 1;

        $expected = $this->Type->get(1)->getName();

        $mission = $this->Missions->get($id, ['contain' => 'TypeMissions']);

        $result = $mission->getType()->getName();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getMentor
     *
     * @return object user
     */
    public function testGetMentor()
    {
        $id = 1;

        $expectedUser = $this->Users->get(1);

        $mission = $this->Missions->get($id, ['contain' => 'Users']);

        $mentor = $mission->getMentor();

        $this->assertEquals($expectedUser, $mentor);
    }

    /**
     * Test getProfessor
     *
     * @return object user
     */
    public function testGetProfessor()
    {
        $id = 1;

        $expectedUser = $this->Users->get(1)->getName();

        $mission = $this->Missions->get($id, ['contain' => ['Professors']]);

        $professor = $mission->getProfessor()->getName();

        $this->assertEquals($expectedUser, $professor);
    }

    /**
     * Test getApplications
     *
     * @return void
     */
    public function testGetApplications()
    {
        $id = 8;
        $expected = 3;

        $mission = $this->Missions->get($id, ['contain' => 'Applications']);

        $result = count($mission->getApplications());

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getApplicationsNull
     *
     * @return void
     */
    public function testGetApplicationsNull()
    {
        $id = 2;
        $expected = 0;

        $mission = $this->Missions->get($id, ['contain' => 'Applications']);

        $result = count($mission->getApplications());

        $this->assertEquals($expected, $result);
    }

    /**
     * Test setProjectId
     *
     * @return void
     */
    public function testSetProjectId()
    {
        $id = 1;
        $expected = 1;

        $user = $this->Missions->get($id);

        $result = $user->editProjectId($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test setMentorId
     *
     * @return void
     */
    public function testSetMentorId()
    {
        $id = 1;
        $expected = 1;

        $user = $this->Missions->get($id);

        $result = $user->editMentorId($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test setProfessorId
     *
     * @return void
     */
    public function testSetProfessorId()
    {
        $id = 1;
        $expected = 1;

        $user = $this->Missions->get($id);

        $result = $user->editProfessorId($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test validation
     *
     * @return void
     */
    public function testValidation()
    {
        $validator = new Validator();

        $expected = $validator;

        $result = $this->Missions->validationDefault($validator);

        $this->assertEquals($validator, $result);
    }

    /**
     * Test buildRules
     *
     * @return void
     */
    public function testBuildRules()
    {
        $rule = new RulesChecker();

        $expected = $rule;

        $result = $this->Missions->buildRules($rule);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test isArchived (bool of mission)
     *
     * @return void
     */
    public function testIsArchived()
    {
        $id = 5;
        $expected = 1;

        $mission = $this->Missions->get($id);

        $result = $mission->isArchived();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test isArchived (bool of project)
     *
     * @return void
     */
    public function testIsArchivedByDefault()
    {
        $id = 2;
        $expected = 1;

        $mission = $this->Missions->get($id);

        $result = $mission->isArchived();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test isArchived (not archived)
     *
     * @return void
     */
    public function testIsArchivedNo()
    {
        $id = 6;
        $expected = 0;

        $mission = $this->Missions->get($id);

        $result = $mission->isArchived();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editArchived
     *
     * @return void
     */
    public function testSetArchived()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test editInternNbr
     *
     * @return void
     */
    public function testSetInternNbr()
    {
        $id = 1;
        $expected = 3;

        $mission = $this->Missions->get($id);

        $mission->editInternNbr($expected);

        $result = $mission->getInternNbr();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getRemainingPlaces
     *
     * @return void
     */
    public function testGetRemainingPlaces()
    {
        $id = 8;
        $expected = 1;

        $mission = $this->Missions->get($id, ['contain' => 'Applications']);
        $result = $mission->getRemainingPlaces();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getRemainingPlaces with no applications
     *
     * @return void
     */
    public function testGetRemainingPlacesNoApplications()
    {
        $id = 1;
        $expected = 0;

        $mission = $this->Missions->get($id, ['contain' => 'Applications']);
        $result = $mission->getRemainingPlaces();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editTypeId
     *
     * @return void
     */
    public function testEditTypeId()
    {
        $id = 1;
        $expected = 2;

        $mission = $this->Missions->get($id);
        $mission->editTypeId($expected);

        $result = $mission->getTypeId();

        $this->assertEquals($expected, $result);
    }
}
