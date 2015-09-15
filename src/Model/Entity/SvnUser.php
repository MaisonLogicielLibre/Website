<?php
/**
 * Entity of SvnUser
 *
 * @category Entity
 * @package  Website
 * @author   Simon Begin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entity of SvnUser
 *
 * @category Entity
 * @package  Website
 * @author   Simon Begin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class SvnUser extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     * Note that '*' is set to true, which allows all unspecified fields to be
     * mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $accessible = [
        '*' => true,
        'id' => false,
    ];

    /**
     * Get the id
     * @return int id
     */
    public function getId()
    {
        return $this->_properties['id'];
    }

    /**
     * Get the pseudo
     * @return string pseudo
     */
    public function getPseudo()
    {
        return $this->_properties['pseudo'];
    }

    /**
     * Get the svn_id
     * @return int svn_id
     */
    public function getSvnId()
    {
        return $this->_properties['svn_id'];
    }

    /**
     * Get the user_id
     * @return int user_id
     */
    public function getUserId()
    {
        return $this->_properties['user_id'];
    }
}
