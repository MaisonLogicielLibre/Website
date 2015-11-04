<?php
/**
 * Wiki Helper
 *
 * @category Helper
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Wiki Helper
 *
 * @category Helper
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class WikiHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $defaultConfig = [];

    /**
     * BuildLink method.
     *
     * @param string $pageName pageName
     *
     * @return string $url $url
     */
    public function buildLink($pageName)
    {
        $lang = $this->request->session()->read('lang');
        $lang = substr($lang, 0, 2);

        $url = "http://wiki.maisonlogiciellibre.org/doku.php?id=" . $lang . ":" . $pageName;

        return $url;
    }

    /**
     * AddHelper method.
     *
     * @param string $pageName pageName
     *
     * @return string $link $link
     */
    public function addHelper($pageName)
    {
        $link = "<a title='". __('Go to wiki') ."' href='" . $this->buildLink($pageName) . "'><i class='fa fa-question-circle'></i></a>";
        return $link;
    }
}
