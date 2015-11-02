<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\HashComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\HashComponent Test Case
 */
class HashComponentTest extends TestCase
{

    /**
     * setUp method
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
     * tearDown method
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
