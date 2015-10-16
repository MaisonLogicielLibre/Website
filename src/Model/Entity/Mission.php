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
