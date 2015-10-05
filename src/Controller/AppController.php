<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 * @since    0.2.9
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 * @since    0.2.9
 */

class AppController extends Controller
{
    public $helpers = [
        'Less.Less', // required for parsing less files
        'BootstrapUI.Form',
        'BootstrapUI.Html',
        'BootstrapUI.Flash',
        'BootstrapUI.Paginator'
    ];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        $this->set('title', __('ML2'));
        $this->loadComponent('Flash');
        $this->loadComponent(
            'Auth',
            [
            'authorize' => 'Controller',
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ]
            ]
        );
    }
    
    /**
     * Check for browser language and set website language to it
     *
     * @return void
     */
    protected function checkLanguage()
    {
        if (!empty($_GET['lang'])){
			$this->request->session()->write('lang', $_GET['lang']);
			I18n::locale($_GET['lang']);
		}
		else{
			$lang = $this->request->session()->read('lang');
			I18n::locale($lang);
		}	
    }
    
    /**
     * Filter preparation
     * @param Event $event event
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        $this->checkLanguage();
        $this->Auth->allow(['display']);
    }
}
