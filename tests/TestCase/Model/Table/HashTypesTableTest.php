<?php
/**
 * Tests for HashTypesTable
 *
 * @category Test
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HashTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;


/**
 * Tests for HashTypesTable
 *
 * @category Test
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */
class HashTypesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('HashTypes') ? [] : ['className' => 'App\Model\Table\HashTypesTable'];
        $this->HashTypes = TableRegistry::get('HashTypes', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HashTypes);

        parent::tearDown();
    }

    /**
     * Test validation
     * @return void
     */
    public function testValidation()
    {
        $validator = new Validator();

        $expected = $validator;

        $result = $this->HashTypes->validationDefault($validator);

        $this->assertEquals($validator, $result);
    }
}
