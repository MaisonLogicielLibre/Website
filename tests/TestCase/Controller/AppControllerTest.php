<?php
/**
 * Tests for UsersController
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\TestSuite\IntegrationTestCase;

/**
 * Tests for UsersController
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class AppControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_users_users',
        'app.organizations',
        'app.organizations_Projects',
        'app.users',
        'app.type_users',
        'app.svn_users',
        'app.svns',
        'app.universities',
        'app.comments',
        'app.projects',
        'app.projects_contributors',
        'app.projects_mentors',
        'app.missions',
        'app.permissions',
        'app.permissions_type_users',
        'app.meetups',
        'app.news',
        'app.notifications'
    ];

    /**
     * Test language - Ok
     *
     * @return void
     */
    public function testLangSet()
    {
        $expected = "fr_CA";
        
        $this->get('/pages/home?lang=fr_CA');
        $actual = I18n::locale();
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * Test language - empty
     *
     * @return void
     */
    public function testLangEmpty()
    {
        $expected = I18n::locale();
        
        $this->get('/pages/home');
        $actual = I18n::locale();
        
        $this->assertEquals($expected, $actual);
    }
}
