<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MissionsTypeMissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

/**
 * App\Model\Table\MissionsTypeMissionsTable Test Case
 */
class MissionsTypeMissionsTableTest extends TestCase
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
        $config = TableRegistry::exists('MissionsTypeMissions') ? [] : ['className' => 'App\Model\Table\MissionsTypeMissionsTable'];
        $this->MissionsTypeMissions = TableRegistry::get('MissionsTypeMissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MissionsTypeMissions);

        parent::tearDown();
    }

    /**
     * Test validation
     * @return void
     */
    public function testValidation()
    {
        $validator = new Validator();

        $result = $this->MissionsTypeMissions->validationDefault($validator);

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

        $result = $this->MissionsTypeMissions->buildRules($rule);

        $this->assertEquals($expected, $result);
    }
}
