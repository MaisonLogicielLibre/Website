<?php
/**
 * Tests for HashComponent
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\HashComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * Tests for HashComponent
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class HashComponentTest extends TestCase
{

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Hash = new HashComponent($registry);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hash);

        parent::tearDown();
    }

    /**
     * Test hash
     *
     * @return void
     */
    public function testHash()
    {
        $string = 'toto';
        $expected = '31f7a65e315586ac198bd798b6629ce4903d0899476d5741a9f32e2e521b6a66';
        $hash = $this->Hash->hash($string);
        $this->assertEquals($expected, $hash);
    }

    /**
     * Test generateRandomString
     *
     * @return void
     */
    public function testGenerateRandomString()
    {
        $string = $this->Hash->generateRandomString();
        $length = strlen($string);
        $this->assertEquals(30, $length);

        $string = $this->Hash->generateRandomString(60);
        $length = strlen($string);
        $this->assertEquals(60, $length);

        $string = $this->Hash->generateRandomString(1);
        $length = strlen($string);
        $this->assertEquals(1, $length);
    }
}
