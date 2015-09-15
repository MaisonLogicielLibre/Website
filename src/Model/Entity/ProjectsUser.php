<?php
/**
 * Entity of ProjectsUsersTable
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
 * Entity of ProjectsUsersTable
 *
 * @category Entity
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class ProjectsUser extends Entity
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
     * Get the user_id
     * @return int user_id
     */
    public function getUserId()
    {
        return $this->_properties['user_id'];
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
     * Get the cv link
     * @return string cv
     */
    public function getCV()
    {
        return $this->_properties['cv'];
    }
    
    /**
     * Get the description
     * @return string description
     */
    public function getDescription()
    {
        return $this->_properties['description'];
    }
    
    /**
     * Get the presentation
     * @return string presentation
     */
    public function getPresentation()
    {
        return $this->_properties['presentation'];
    }
    
    /**
     * Get if the project is accepted
     * @return int accepted
     */
    public function isAccepted()
    {
        return $this->_properties['accepted'];
    }
    
    /**
     * Get if the user is mentor
     * @return int mentor
     */
    public function isMentor()
    {
        return $this->_properties['is_mentor'];
    }
    
    /**
     * Set the cv link
     * @param  string $cv cv link
     * @return string cv
     */
    public function editCV($cv)
    {
        $this->set('cv', $cv);
        return $cv;
    }
    
    /**
     * Set the description
     * @param  string $description description
     * @return string description
     */
    public function editDescription($description)
    {
        $this->set('description', $description);
        return $description;
    }
    
    /**
     * Set the presentation
     * @param  string $presentation presentation
     * @return string presentation
     */
    public function editPresentation($presentation)
    {
        $this->set('presentation', $presentation);
        return $presentation;
    }
    
    /**
     * Set if the project is accepted
     * @param  int $accepted accepted
     * @return int accepted
     */
    public function editAccepted($accepted)
    {
        $this->set('accepted', $accepted);
        return $accepted;
    }
    
    /**
     * Set if the user is mentor
     * @param  int $mentor mentor
     * @return int mentor
     */
    public function editMentor($mentor)
    {
        $this->set('mentor', $mentor);
        return $mentor;
    }
}
