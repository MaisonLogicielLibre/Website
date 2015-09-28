<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Application Entity.
 *
 * @property int $id
 * @property int $project_id
 * @property \App\Model\Entity\Project $project
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property string $presentation
 * @property int $type_application_id
 * @property \App\Model\Entity\TypeApplication $type_application
 * @property int $weeklyHours
 * @property \Cake\I18n\Time $startDate
 * @property \Cake\I18n\Time $endDate
 * @property bool $accepted
 * @property bool $archived
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
    protected $_accessible = [
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
     * Get the presentation
     * @return string presentation
     */
    public function getPresentation()
    {
        return $this->_properties['presentation'];
    }

    /**
     * Get the start date
     * @return date startDate
     */
    public function getStartDate()
    {
        return $this->_properties['startDate'];
    }

    /**
     * Get the end date
     * @return date endDate
     */
    public function getEndDate()
    {
        return $this->_properties['endDate'];
    }

    /**
     * Get the weekly hours
     * @return int weeklyHours
     */
    public function getWeeklyHours()
    {
        return $this->_properties['weeklyHours'];
    }

    /**
     * If the application has been accepted
     * @return bool accepted
     */
    public function getIsAccepted()
    {
        return $this->_properties['accepted'];
    }

    /**
     * If the application has been archived
     * @return bool archived
     */
    public function getIsArchived()
    {
        return $this->_properties['archived'];
    }

    /**
     * Get project_id
     * @return int project_id
     */
    public function getProjectId()
    {
        return $this->_properties['project_id'];
    }

    /**
     * Get user_id
     * @return int user_id
     */
    public function getUserId()
    {
        return $this->_properties['user_id'];
    }

    /**
     * Get type_application_id
     * @return int type_application_id
     */
    public function getTypeApplicationId()
    {
        return $this->_properties['type_application_id'];
    }

    /**
     * Set the presentation
     * @param string $presentation presentation
     * @return string presentation
     */
    public function editPresentation($presentation)
    {
        $this->set('presentation', $presentation);
        return $presentation;
    }

    /**
     * Set if the application has been accepted
     * @param bool $accepted accepted
     * @return bool accepted
     */
    public function editAccepted($accepted)
    {
        $this->set('accepted', $accepted);
        return $accepted;
    }

    /**
     * Set if the application has been archived
     * @param bool $archived archived
     * @return bool archived
     */
    public function editArchived($archived)
    {
        $this->set('archived', $archived);
        return $archived;
    }

    /**
     * Set user_id
     * @param int $id id
     * @return int id
     */
    public function editUserId($id)
    {
        $this->set('user_id', $id);
        return $id;
    }

    /**
     * Set project_id
     * @param int $id id
     * @return int id
     */
    public function editProjectId($id)
    {
        $this->set('project_id', $id);
        return $id;
    }
}
