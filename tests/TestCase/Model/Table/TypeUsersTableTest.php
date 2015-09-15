<?php
/**
 * Tests for TypeUsersTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Tests for TypeUsersTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class TypeUsersTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_users',
        'app.users',
        'app.universities',
        'app.comments',
        'app.projects_users',
        'app.type_users_users'
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypeUsers') ? [] : ['className' => 'App\Model\Table\TypeUsersTable'];
        $this->TypeUsers = TableRegistry::get('TypeUsers', $config);
    }
    
    /**
     * Test getId
     * @return void
     */
    public function testGetId()
    {
        $id = 1;
        $expected = 1;

        $type = $this->TypeUsers->get($id);

        $result = $type->getId();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getName
     * @return void
     */
    public function testGetName()
    {
        $id = 1;
        $expected = 'student';

        $type = $this->TypeUsers->get($id);

        $result = $type->getName();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editName
     * @return void
     */
    public function testSetName()
    {
        $id = 1;
        $expected = 'admin';

        $type = $this->TypeUsers->get($id);

        $result = $type->editName($expected);

        $this->assertEquals($expected, $result);
    }
}
