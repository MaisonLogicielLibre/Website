<?php
/**
 * Pages controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Pages controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class PagesController extends AppController
{
    /**
     * Filter preparation
     *
     * @param Event $event event
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['display', 'home', 'tv']);
    }
    
    /**
     * Display method
     * @return redirect
     */
    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    /**
     * Home method
     * @return redirect
     */
    public function home()
    {
        $this->loadModel("Users");
        $numberUsers = $this->Users->find('all')->count();
        $numberStudents = $this->Users->find('all')->where(['isStudent' => true])->count();

        $this->loadModel("Projects");
        $numberProjects = $this->Projects->find('all')->count();

        $this->loadModel("Missions");
        $numberMissions = $this->Missions->find('all')->count();

        $this->set(compact('numberUsers', 'numberProjects', 'numberMissions', 'numberStudents'));
    }

    /**
     *
     * @param null $id
     * @return redirect
     */
    public function tv($id = null) {
        $this->viewBuilder()->layout(false);
        switch ($id) {
            case 1:
                $this->render('tv1');
                break;
            case 2:
                $this->render('tv1');
                break;
            case 3:
                $this->render('tv1');
                break;
            case 4:
                $this->render('tv1');
                break;
            case 5:
                $this->render('tv1');
                break;
            default:
                $this->render('tv1');
                break;
        }
    }
}
