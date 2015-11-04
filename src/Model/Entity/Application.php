<?php
/**
 * Entity of ApplicationTable
 *
 * @category Entity
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Entity of ApplicationTable
 *
 * @category Entity
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */
class Application extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $accessible = [
        '*' => true,
        'id' => false,
    ];
    
    /**
     * Get the user id
     * @return int userId
     */
    public function getUserId()
    {
        return $this->_properties['user_id'];
    }
    
    /**
     * Get if accepted
     * @return int userId
     */
    public function getAccepted()
    {
        return $this->_properties['accepted'];
    }
    
    /**
     * Get if rejected
     * @return int userId
     */
    public function getRejected()
    {
        return $this->_properties['rejected'];
    }
    
    /**
     * Set the missionId
     * @param int $missionId missionId
     * @return int missionId
     */
    public function editMissionId($missionId)
    {
        $this->set('mission_id', $missionId);
        return $missionId;
    }
    
    /**
     * Set the userId
     * @param int $userId userId
     * @return int userId
     */
    public function editUserId($userId)
    {
        $this->set('user_id', $userId);
        return $userId;
    }
    
    /**
     * Set if the application is accepted
     * @param int $isAccepted isAccepted
     * @return int isAccepted
     */
    public function editAccepted($isAccepted)
    {
        $this->set('accepted', $isAccepted);
        return $isAccepted;
    }
    
    /**
     * Set if the application is rejected
     * @param int $isRejected isRejected
     * @return int isRejected
     */
    public function editRejected($isRejected)
    {
        $this->set('rejected', $isRejected);
        return $isRejected;
    }
}
