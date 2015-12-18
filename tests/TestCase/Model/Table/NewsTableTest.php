<?php
/**
 * Tests for NewsTable
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
 * Tests for MissionsTable
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class NewsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.news'
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('News') ? [] : ['className' => 'App\Model\Table\NewsTable'];
        $this->News = TableRegistry::get('News', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->News);

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

        $result = $this->News->buildRules($rule);

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

        $result = $this->News->validationDefault($validator);

        $this->assertEquals($validator, $result);
    }
}
