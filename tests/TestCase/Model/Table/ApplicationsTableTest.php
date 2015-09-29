<?php
/**
 * Tests for ApplicationTable
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommentsTable;
use Cake\I18n\Time;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for ApplicationTable
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
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
        'app.organizations',
        'app.organizations_projects',
        'app.universities',
        'app.comments',
        'app.users',
        'app.projects_contributors',
        'app.projects_mentors',
        'app.type_users',
        'app.type_users_users',
        'app.type_applications'
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
     * Test getId
     * @return void
     */
    public function testGetId()
    {
        $id = 1;
        $expected = 1;

        $application = $this->Applications->get($id);

        $result = $application->getId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getPresentation
     * @return void
     */
    public function testGetPresentation()
    {
        $id = 1;
        $expected = 'Du texte';

        $application = $this->Applications->get($id);

        $result = $application->getPresentation();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getStartDate
     * @return void
     */
    public function testGetStartDate()
    {
        $id = 1;
        $expected = new Time('2015-09-28');

        $application = $this->Applications->get($id);

        $result = $application->getStartDate();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getEndDate
     * @return void
     */
    public function testGetEndDate()
    {
        $id = 1;
        $expected = new Time('2015-09-28');

        $application = $this->Applications->get($id);

        $result = $application->getEndDate();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getWeeklyHours
     * @return void
     */
    public function testGetWeeklyHours()
    {
        $id = 1;
        $expected = '15';

        $application = $this->Applications->get($id);

        $result = $application->getWeeklyHours();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getIsAccepted
     * @return void
     */
    public function testGetIsAccepted()
    {
        $id = 1;
        $expected = false;

        $application = $this->Applications->get($id);

        $result = $application->getIsAccepted();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getIsArchived
     * @return void
     */
    public function testGetIsArchived()
    {
        $id = 1;
        $expected = false;

        $application = $this->Applications->get($id);

        $result = $application->getIsArchived();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getProjectId
     * @return void
     */
    public function testGetProjectId()
    {
        $id = 1;
        $expected = 1;

        $application = $this->Applications->get($id);

        $result = $application->getProjectId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getUserId
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
     * Test getTypeApplicationId
     * @return void
     */
    public function testGetTypeApplicationId()
    {
        $id = 1;
        $expected = 1;

        $application = $this->Applications->get($id);

        $result = $application->getTypeApplicationId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editPresentation
     * @return void
     */
    public function testEditPresentation()
    {
        $id = 1;
        $expected = 'stuff';

        $application = $this->Applications->get($id);

        $result = $application->editPresentation($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editAccepted
     * @return void
     */
    public function testEditAccepted()
    {
        $id = 1;
        $expected = true;

        $application = $this->Applications->get($id);

        $result = $application->editAccepted($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editArchived
     * @return void
     */
    public function testEditArchived()
    {
        $id = 1;
        $expected = true;

        $application = $this->Applications->get($id);

        $result = $application->editArchived($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editUserId
     * @return void
     */
    public function testEditUserId()
    {
        $id = 1;
        $expected = 3;

        $application = $this->Applications->get($id);

        $result = $application->editUserId($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editProjectId
     * @return void
     */
    public function testEditProjectId()
    {
        $id = 1;
        $expected = 3;

        $application = $this->Applications->get($id);

        $result = $application->editProjectId($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test validation
     * @return void
     */
    public function testValidation()
    {
        $validator = new Validator();

        $expected = $validator;

        $result = $this->Applications->validationDefault($validator);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test buildRules
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
