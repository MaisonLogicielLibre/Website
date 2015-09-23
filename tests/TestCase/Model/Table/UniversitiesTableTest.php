<?php
/**
 * Tests for UniversitiesTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UniversitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for UniversitiesTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class UniversitiesTableTest extends TestCase
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
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Universities') ? [] : ['className' => 'App\Model\Table\UniversitiesTable'];
        $this->Universities = TableRegistry::get('Universities', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Universities);

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

        $uni = $this->Universities->get($id);

        $result = $uni->getId();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getName
     * @return void
     */
    public function testGetName()
    {
        $id = 1;
        $expected = 'ETS';

        $uni = $this->Universities->get($id);

        $result = $uni->getName();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getWebsite
     * @return void
     */
    public function testGetWebsite()
    {
        $id = 1;
        $expected = 'www.website.com';

        $uni = $this->Universities->get($id);

        $result = $uni->getWebsite();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editName
     * @return void
     */
    public function testSetName()
    {
        $id = 1;
        $expected = 'ÉTS';

        $uni = $this->Universities->get($id);

        $result = $uni->editName($expected);

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editWebsite
     * @return void
     */
    public function testSetWebsite()
    {
        $id = 1;
        $expected = 'www.allo.com';

        $uni = $this->Universities->get($id);

        $result = $uni->editWebsite($expected);

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
        
        $result = $this->Universities->validationDefault($validator);
        
        $this->assertEquals($validator, $result);
    }
}
