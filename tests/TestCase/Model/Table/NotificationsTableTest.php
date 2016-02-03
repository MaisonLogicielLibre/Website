<?php
/**
 * Tests for NotificationsTable
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicationsTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for NotificationsTable
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class NotificationsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.notifications',
        'app.users'
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Notifications') ? [] : ['className' => 'App\Model\Table\NotificationsTable'];
        $this->Notifications = TableRegistry::get('Notifications', $config);
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
        unset($this->Notifications);

        parent::tearDown();
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

        $result = $this->Notifications->buildRules($rule);

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

        $result = $this->Notifications->validationDefault($validator);

        $this->assertEquals($validator, $result);
    }

    /**
     * Test getId
     *
     * @return void
     */
    public function testGetId()
    {
        $id = 1;
        $expected = 1;

        $notification = $this->Notifications->get($id);

        $result = $notification->getId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getName
     *
     * @return void
     */
    public function testGetName()
    {
        $id = 1;
        $expected = 'notification1';

        $notification = $this->Notifications->get($id);

        $result = $notification->getName();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getUser
     *
     * @return void
     */
    public function testGetUser()
    {
        $id = 1;
        $expected = $this->Users->get(1);

        $notification = $this->Notifications->get($id, ['contain' => 'Users']);

        $result = $notification->getUser();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getLink
     *
     * @return void
     */
    public function testGetLink()
    {
        $id = 1;
        $expected = 'projects/view/1';

        $notification = $this->Notifications->get($id);

        $result = $notification->getLink();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editName
     *
     * @return void
     */
    public function testSetName()
    {
        $id = 1;
        $expected = 'notification';

        $notification = $this->Notifications->get($id);

        $result = $notification->editName($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editUser
     *
     * @return void
     */
    public function testSetUser()
    {
        $id = 1;
        $expected = $this->Users->get(1);

        $notification = $this->Notifications->get($id, ['contain' => 'Users']);

        $result = $notification->editUser($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editLink
     *
     * @return void
     */
    public function testSetLink()
    {
        $id = 1;
        $expected = 'organizations/view/1';

        $notification = $this->Notifications->get($id);

        $result = $notification->editLink($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test isRead
     *
     * @return void
     */
    public function testIsRead()
    {
        $id = 1;
        $expected = 1;

        $notification = $this->Notifications->get($id);

        $result = $notification->isRead();

        $this->assertEquals($expected, $result);
    }
}
