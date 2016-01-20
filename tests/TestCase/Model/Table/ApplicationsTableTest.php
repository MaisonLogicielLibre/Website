<?php
/**
 * Tests for ApplicationsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicationsTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for ApplicationsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class ApplicationsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applications',
        'app.projects',
        'app.missions',
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
        'app.organizations_owners',
        'app.organizations_members',
        'app.mission_levels',
        'app.missions_mission_levels',
        'app.type_missions',
        'app.missions_type_missions'
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Applications') ? [] : ['className' => 'App\Model\Table\ApplicationsTable'];
        $this->Applications = TableRegistry::get('Applications', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Applications);

        parent::tearDown();
    }

    /**
     * Test getUserId
     *
     * @return void
     */
    public function testGetUserId()
    {
        $id = 1;
        $expected = 1;

        $application = $this->Applications->get($id);

        $result = $application->getUserId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getRejected
     *
     * @return void
     */
    public function testGetRejected()
    {
        $id = 1;
        $expected = false;

        $application = $this->Applications->get($id);

        $result = $application->getRejected();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getText
     *
     * @return void
     */
    public function testGetText()
    {
        $id = 1;
        $expected = '';

        $application = $this->Applications->get($id);

        $result = $application->getText();

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
        $expected = 1;

        $application = $this->Applications->get($id);

        $result = $application->getType();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getEmail
     *
     * @return void
     */
    public function testGetEmail()
    {
        $id = 1;
        $expected = 'test@test.com';

        $application = $this->Applications->get($id);

        $result = $application->getEmail();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getAccepted
     *
     * @return void
     */
    public function testGetAccepted()
    {
        $id = 1;
        $expected = false;

        $application = $this->Applications->get($id);

        $result = $application->getAccepted();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test edituserId
     *
     * @return void
     */
    public function testEditUserId()
    {
        $id = 1;
        $expected = 2;

        $application = $this->Applications->get($id);

        $result = $application->edituserId(2);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editMissionId
     *
     * @return void
     */
    public function testEditMissionId()
    {
        $id = 1;
        $expected = 2;

        $application = $this->Applications->get($id);

        $result = $application->editMissionId(2);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editRejected
     *
     * @return void
     */
    public function testEditRejected()
    {
        $id = 1;
        $expected = true;

        $application = $this->Applications->get($id);

        $result = $application->editRejected(true);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editAccepted
     *
     * @return void
     */
    public function testEditAccepted()
    {
        $id = 1;
        $expected = true;

        $application = $this->Applications->get($id);

        $result = $application->editAccepted(true);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editText
     *
     * @return void
     */
    public function testEditText()
    {
        $id = 1;
        $expected = 'Plop';

        $application = $this->Applications->get($id);

        $result = $application->editText('Plop');

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editEmail
     *
     * @return void
     */
    public function testEditEmail()
    {
        $id = 1;
        $expected = 'test2@test.com';

        $application = $this->Applications->get($id);

        $result = $application->editEmail('test2@test.com');

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editType
     *
     * @return void
     */
    public function testEditType()
    {
        $id = 1;
        $expected = 1;

        $application = $this->Applications->get($id);

        $result = $application->editType(1);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $validator = new Validator();

        $expected = $validator;

        $result = $this->Applications->validationDefault($validator);

        $this->assertEquals($validator, $result);
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $rule = new RulesChecker();

        $expected = $rule;

        $result = $this->Applications->buildRules($rule);

        $this->assertEquals($expected, $result);
    }
}
