<?php
/**
 * Tests for HashesTable
 *
 * @category Test
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HashesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for HashesTable
 *
 * @category Test
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */
class HashesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hashes',
        'app.users',
        'app.universities',
        
        'app.applications',
        'app.projects',
        'app.missions',
        'app.mission_levels',
        'app.missions_mission_levels',
        'app.type_missions',
        'app.organizations',
        'app.organizations_projects',
        'app.projects_contributors',
        'app.projects_mentors',
        'app.type_users',
        'app.permissions',
        'app.permissions_type_users',
        'app.type_users_users',
        'app.organizations_owners',
        'app.organizations_members',
        'app.hash_types'
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Hashes') ? [] : ['className' => 'App\Model\Table\HashesTable'];
        $this->Hashes = TableRegistry::get('Hashes', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hashes);

        parent::tearDown();
    }

    /**
     * Test getTypeId
     *
     * @return void
     */
    public function testGetTypeId()
    {
        $id = 1;
        $expected = 1;

        $hash = $this->Hashes->get($id);

        $result = $hash->getTypeId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test isUsed
     *
     * @return void
     */
    public function testIsUsed()
    {
        $id = 1;
        $expected = false;

        $hash = $this->Hashes->get($id);

        $result = $hash->isUsed();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test isExpired
     *
     * @return void
     */
    public function testIsExpiredFalse()
    {
        $id = 1;
        $expected = false;

        $hash = $this->Hashes->get($id);

        $result = $hash->isExpired();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test isExpired
     *
     * @return void
     */
    public function testIsExpiredTrue()
    {
        $id = 3;
        $expected = true;

        $hash = $this->Hashes->get($id);

        $result = $hash->isExpired();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test setHash
     *
     * @return void
     */
    public function testSetHash()
    {
        $id = 1;
        $expected = "toto";

        $hash = $this->Hashes->get($id);

        $result = $hash->setHash($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test setUser
     *
     * @return void
     */
    public function testSetUser()
    {
        $id = 1;

        $user = TableRegistry::get('users')->get(1);
        $hash = $this->Hashes->get($id);

        $result = $hash->setUser($user);

        $this->assertEquals($user, $result);
    }

    /**
     * Test setType
     *
     * @return void
     */
    public function testSetType()
    {
        $id = 1;

        $type = TableRegistry::get('hashTypes')->get(1);
        $hash = $this->Hashes->get($id);

        $result = $hash->setType($type);

        $this->assertEquals($type, $result);
    }

    /**
     * Test setUsed
     *
     * @return void
     */
    public function testSetUsed()
    {
        $id = 1;
        $expected = true;

        $hash = $this->Hashes->get($id);

        $result = $hash->setUsed($expected);

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

        $result = $this->Hashes->validationDefault($validator);

        $this->assertEquals($validator, $result);
    }
}
