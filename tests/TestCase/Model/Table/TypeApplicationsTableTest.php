<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeApplicationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeApplicationsTable Test Case
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
     * setUp method
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
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeApplications);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
