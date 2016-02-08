<?php
/**
 * Tests for NewsController
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Controller;

use App\Controller\NewsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * Tests for NewsController
 *
 * @category Test
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class NewsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.news',
        'app.users',
        'app.permissions',
        'app.permissions_type_users',
        'app.type_users',
        'app.type_users_users'
    ];

    /**
     * Test index - Ok
     *
     * @return void
     */
    public function testIndexOk()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/news');
        $this->assertResponseOk();
    }

    /**
     * Test index - No Auth
     *
     * @return void
     */
    public function testIndexNoAuth()
    {
        $this->get('/news');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test index - No Perm
     *
     * @return void
     */
    public function testIndexNoPerm()
    {
        $this->session(['Auth.User.id' => 4]);

        $this->get('/news');
        $this->assertResponseSuccess();
    }

    /**
     * Test edit - Ok
     *
     * @return void
     */
    public function testEditOk()
    {
        $this->session(['Auth.User.id' => 1]);

        $data = [
            'name' => 'amet',
            'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'date' => '2015-11-26 16:23:46',
            'link' => 'Lorem ipsum dolor sit amet'
        ];

        $this->get('/news/edit/1');
        $this->post('/news/edit/1', $data);
        $this->assertRedirect(['controller' => 'News', 'action' => 'index']);
    }

    /**
     * Test edit - No Auth
     *
     * @return void
     */
    public function testEditNoAuth()
    {
        $this->get('/news/edit/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test edit - No Perm
     *
     * @return void
     */
    public function testEditNoPerm()
    {
        $this->session(['Auth.User.id' => 4]);

        $this->get('/news/edit/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test add - Ok
     *
     * @return void
     */
    public function testAddOk()
    {
        $this->session(['Auth.User.id' => 1]);

        $data = [
            'name' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'date' => '2015-11-26 16:23:46',
            'link' => 'Lorem ipsum dolor sit amet'
        ];

        $this->get('/news/add');
        $this->post('/news/add', $data);
        $this->assertRedirect(['controller' => 'News', 'action' => 'index']);
    }

    /**
     * Test add - No
     *
     * @return void
     */
    public function testAddNo()
    {
        $this->session(['Auth.User.id' => 1]);

        $data = [
            'name' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'date' => '2015-11-26 16:23:46',
            'link' => 'Lorem ipsum dolor sit amet'
        ];

        $this->get('/news/add');
        $this->post('/news/add', $data);
        $this->assertResponseSuccess();
    }

    /**
     * Test add - No Auth
     *
     * @return void
     */
    public function testAddNoAuth()
    {
        $this->get('/news/add');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test add - No Perm
     *
     * @return void
     */
    public function testAddNoPerm()
    {
        $this->session(['Auth.User.id' => 4]);

        $this->get('/news/add');
        $this->assertResponseSuccess();
    }


    /**
     * Test delete - Ok
     *
     * @return void
     */
    public function testDeleteOk()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->post('/news/delete/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test delete - No Auth
     *
     * @return void
     */
    public function testDeleteNoAuth()
    {
        $this->get('/news/delete/1');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Test delete - No Perm
     *
     * @return void
     */
    public function testDeleteNoPerm()
    {
        $this->session(['Auth.User.id' => 4]);

        $this->get('/news/delete/1');
        $this->assertResponseSuccess();
    }
}
