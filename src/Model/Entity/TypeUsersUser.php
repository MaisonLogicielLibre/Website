<?php
/**
 * Entity of TypeUsersUsersTable
 *
 * @category Entity
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entity of TypeUsersUsersTable
 *
 * @category Entity
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class TypeUsersUser extends Entity
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
     * Get the type_user_id
     * @return int type_user_id
     */
    public function getTypeUserId()
    {
        return $this->_properties['type_user_id'];
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
