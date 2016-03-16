<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MembershipsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MembershipsTable Test Case
 */
class MembershipsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MembershipsTable
     */
    public $Memberships;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.memberships',
        'app.organizations',
        'app.projects',
        'app.missions',
        'app.users',
        'app.universities',
        'app.comments',
        'app.hashes',
        'app.applications',
        'app.students',
        'app.svn_users',
        'app.svns',
        'app.projects_contributors',
        'app.projects_mentored',
        'app.organizations_projects',
        'app.contributors',
        'app.projects_mentors',
        'app.type_users',
        'app.permissions',
        'app.permissions_type_users',
        'app.type_users_users',
        'app.owners',
        'app.members',
        'app.organizations_owners',
        'app.type_missions',
        'app.users_type_missions',
        'app.organizations_members',
        'app.mentors',
        'app.professors',
        'app.propositions',
        'app.mission_levels',
        'app.missions_mission_levels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Memberships') ? [] : ['className' => 'App\Model\Table\MembershipsTable'];
        $this->Memberships = TableRegistry::get('Memberships', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Memberships);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
