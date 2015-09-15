<?php
/**
 * Tests for SvnsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SvnsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Tests for SvnsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class SvnsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.svns',
        'app.svn_users',
        'app.users',
        'app.type_users',
        'app.universities',
        'app.comments',
        'app.projects_users',
        'app.projects',
        'app.missions',
        'app.projects_users_missions',
        'app.organizations',
        'app.organizations_projects'
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Svns') ? [] : ['className' => 'App\Model\Table\SvnsTable'];
        $this->Svns = TableRegistry::get('Svns', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Svns);

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

        $svn = $this->Svns->get($id);

        $result = $svn->getId();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getName
     * @return void
     */
    public function testGetName()
    {
        $id = 1;
        $expected = 'GitHub';

        $svn = $this->Svns->get($id);

        $result = $svn->getName();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editName
     * @return void
     */
    public function testSetName()
    {
        $id = 1;
        $expected = 'BitBucket';

        $svn = $this->Svns->get($id);

        $result = $svn->editName($expected);

        $this->assertEquals($expected, $result);
    }
}
