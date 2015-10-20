<?php
/**
 * Tests for TypeMissionsTable
 *
 * @category Test
 * @package  Website
 * @author   Simon Begin <ak36250@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeMissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

/**
 * Tests for TypeMissionsTable
 *
 * @category Test
 * @package  Website
 * @author   Simon Begin <ak36250@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class TypeMissionsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_missions',
        'app.missions',
        'app.mission_levels',
        'app.missions_mission_levels',
        'app.missions_type_missions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypeMissions') ? [] : ['className' => 'App\Model\Table\TypeMissionsTable'];
        $this->TypeMissions = TableRegistry::get('TypeMissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeMissions);

        parent::tearDown();
    }

    /**
     * Test getName
     * @return void
     */
    public function testGetName()
    {
        $id = 1;
        $expected = 'Intern';

        $type = $this->TypeMissions->get($id);

        $result = $type->getName();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test validation
     * @return void
     */
    public function testValidation()
    {
        $validator = new Validator();

        $result = $this->TypeMissions->validationDefault($validator);

        $this->assertEquals($validator, $result);
    }

    /**
     * Test buildRules
     * @return void
     */
    public function testBuildRules()
    {
        $rule = new RulesChecker();

        $expected = $rule;

        $result = $this->TypeMissions->buildRules($rule);

        $this->assertEquals($expected, $result);
    }
}
