<?php
/**
 * Tests for StatisticsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatisticsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for StatisticsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class StatisticsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.statistics'
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Statistics') ? [] : ['className' => 'App\Model\Table\StatisticsTable'];
        $this->Statistics = TableRegistry::get('Statistics', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Statistics);

        parent::tearDown();
    }
    
    /**
     * Test getCommits
     * @return void
     */
    public function testGetCommits()
    {
        $id = 1;
        $expected = 1;

        $application = $this->Statistics->get($id);

        $result = $application->getCommits();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getPullRequests
     * @return void
     */
    public function testGetPullRequests()
    {
        $id = 1;
        $expected = 2;

        $application = $this->Statistics->get($id);

        $result = $application->getPullRequests();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getPullRequestsOpen
     * @return void
     */
    public function testGetPullRequestsOpen()
    {
        $id = 1;
        $expected = 1;

        $application = $this->Statistics->get($id);

        $result = $application->getPullRequestsOpen();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getPullRequestsClose
     * @return void
     */
    public function testGetPullRequestsClose()
    {
        $id = 1;
        $expected = 1;

        $application = $this->Statistics->get($id);

        $result = $application->getPullRequestsClose();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getIssues
     * @return void
     */
    public function testGetIssues()
    {
        $id = 1;
        $expected = 2;

        $application = $this->Statistics->get($id);

        $result = $application->getIssues();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getIssuesOpen
     * @return void
     */
    public function testGetIssuesOpen()
    {
        $id = 1;
        $expected = 1;

        $application = $this->Statistics->get($id);

        $result = $application->getIssuesOpen();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getIssuesClose
     * @return void
     */
    public function testGetIssuesClose()
    {
        $id = 1;
        $expected = 1;

        $application = $this->Statistics->get($id);

        $result = $application->getIssuesClose();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getContributions
     * @return void
     */
    public function testGetContribution()
    {
        $id = 1;
        $expected = 5;

        $application = $this->Statistics->get($id);

        $result = $application->getContribution();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getContributionsDate
     * @return void
     */
    public function testGetContributionDate()
    {
        $id = 1;
        $expected = "11/18";

        $application = $this->Statistics->get($id);

        $result = $application->getContributionDate();

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
        
        $result = $this->Statistics->validationDefault($validator);
        
        $this->assertEquals($validator, $result);
    }
}
