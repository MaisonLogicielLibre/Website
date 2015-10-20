<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mission Entity.
 *
 * @property int $id
 * @property int $session
 * @property int $length
 * @property string $description
 * @property string $competence
 * @property int $mentor_id
 * @property int $type_mission
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Project $project
 */
class Mission extends Entity
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
     * Get the project_id
     * @return int id
     */
    public function getProjectId()
    {
        return $this->_properties['project_id'];
    }

    /**
     * Get the mentor_id
     * @return int id
     */
    public function getMentorId()
    {
        return $this->_properties['mentor_id'];
    }

    /**
     * Get the name
     * @return string name
     */
    public function getName()
    {
        return $this->_properties['name'];
    }

    /**
     * Get the project
     * @return object project
     */
    public function getProject()
    {
        return $this->_properties['project'];
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
     * Get the competence
     * @return string competence
     */
    public function getCompetence()
    {
        return $this->_properties['competence'];
    }

    /**
     * Get the internNbr
     * @return int internNbr
     */
    public function getInternNbr()
    {
        return $this->_properties['internNbr'];
    }

    /**
     * Get the session
     * @return string session
     */
    public function getSession()
    {
        switch ($this->_properties['session']) {
            case 1:
                return __('Winter');
                break;
            case 2:
                return __('Summer');
                break;
            case 3:
                return __('Fall');
                break;
            default:
                return __('Not specified');
        }
    }

    /**
     * Get the length
     * @return string length
     */
    public function getLength()
    {
        switch ($this->_properties['length']) {
            case 1:
                return __('1 term');
                break;
            case 2:
                return __('2 terms');
                break;
            case 3:
                return __('3 terms');
                break;
            default:
                return __('Not specified');
        }
    }

    /**
     * Get the mission_levels
     * @return array mission_levels
     */
    public function getLevels()
    {
        return $this->_properties['mission_levels'];
    }

    /**
     * Get the type_missions
     * @return array type_misssions
     */
    public function getType()
    {
        return $this->_properties['type_missions'];
    }

    /**
     * Get the mentor
     * @return object user
     */
    public function getMentor()
    {
        return $this->_properties['user'];
    }

    /**
     * Set the project_id
     * @param integer $project_id project_id
     * @return integer project_id
     */
    public function editProjectId($project_id)
    {
        $this->set('project_id', $project_id);
        return $project_id;
    }

    /**
     * Set the mentor_id
     * @param integer $mentor_id mentor_id
     * @return integer mentor_id
     */
    public function editMentorId($mentor_id)
    {
        $this->set('mentor_id', $mentor_id);
        return $mentor_id;
    }
}
