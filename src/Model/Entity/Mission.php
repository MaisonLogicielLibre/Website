<?php
/**
 * Entity of CommentsTable
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
 * Entity of CommentsTable
 *
 * @category Entity
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class Mission extends Entity
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
     * Get the project_id
     * @return int project_id
     */
    public function getProjectId()
    {
        return $this->_properties['project_id'];
    }
    
    /**
     * Get the role
     * @return string role
     */
    public function getRole()
    {
        return $this->_properties['role'];
    }
    
    /**
     * Get the mission
     * @return string mission
     */
    public function getMission()
    {
        return $this->_properties['mission'];
    }
    
    /**
     * Get if the mission is active
     * @return int active
     */
    public function isActive()
    {
        return $this->_properties['active'];
    }
    
    /**
     * Set the role
     * @param  string $role role
     * @return string role
     */
    public function editRole($role)
    {
        $this->set('role', $role);
        return $role;
    }
    
    /**
     * Set the mission
     * @param  string $mission mission
     * @return string mission
     */
    public function editMission($mission)
    {
        $this->set('mission', $mission);
        return $mission;
    }
    
    /**
     * Set if the mission is active
     * @param  int $active active
     * @return int active
     */
    public function editActive($active)
    {
        $this->set('active', $active);
        return $active;
    }
}
