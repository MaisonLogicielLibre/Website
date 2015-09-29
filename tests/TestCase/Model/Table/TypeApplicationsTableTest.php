<?php
/**
 * Tests for TypeApplicationTable
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeApplicationsTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for TypeApplicationTable
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class TypeApplicationsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_applications',
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
        $config = TableRegistry::exists('TypeApplications') ? [] : ['className' => 'App\Model\Table\TypeApplicationsTable'];
        $this->TypeApplications = TableRegistry::get('TypeApplications', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeApplications);

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

        $result = $this->TypeApplications->validationDefault($validator);

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

        $result = $this->TypeApplications->buildRules($rule);

        $this->assertEquals($expected, $result);
    }
}
