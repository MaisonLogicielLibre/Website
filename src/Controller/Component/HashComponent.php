<?php
/**
 * Hash Component
 *
 * @category Table
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * Hash Component
 *
 * @category Table
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */
class HashComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $defaultConfig = [];

    /**
     * Hash method.
     *
     * @param string $data data
     *
     * @return string $hash hash
     */
    public function hash($data)
    {
        $hash = hash("sha256", $data);
        return $hash;
    }

    /**
     * GenerateRandomString method.
     *
     * @param int $length length
     *
     * @return string $randomString randomString
     */
    public function generateRandomString($length = 30)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
