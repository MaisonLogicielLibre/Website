<?php
/**
 * Tests for WikiHelper
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\WikiHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * Tests for WikiHelper
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class WikiHelperTest extends TestCase
{

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Wiki = new WikiHelper($view);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Wiki);

        parent::tearDown();
    }

    /**
     * Test buildLink
     *
     * @return void
     */
    public function testBuildLink()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    /**
     * Test AddHelper
     *
     * @return void
     */
    public function testAddHelper()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
