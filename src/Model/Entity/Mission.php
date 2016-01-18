<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Mission Entity.
 *
 * @property int $id
 * @property string $name
 * @property int $session
 * @property int $length
 * @property string $description
 * @property string $competence
 * @property int $internNbr
 * @property int $project_id
 * @property \App\Model\Entity\Project $project
 * @property int $mentor_id
 * @property \App\Model\Entity\Mentor $mentor
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $archived
 * @property int $professor_id
 * @property \App\Model\Entity\Professor $professor
 * @property int $type_id
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Application[] $applications
 * @property \App\Model\Entity\Proposition[] $propositions
 * @property \App\Model\Entity\MissionLevel[] $mission_levels
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
     * Get the id
     *
     * @return int id
     */
    public function getId()
    {
        return $this->_properties['id'];
    }

    /**
     * Get the project_id
     *
     * @return int id
     */
    public function getProjectId()
    {
        return $this->_properties['project_id'];
    }

    /**
     * Get the mentor_id
     *
     * @return int id
     */
    public function getMentorId()
    {
        return $this->_properties['mentor_id'];
    }

    /**
     * Get the professor_id
     *
     * @return int id
     */
    public function getProfessorId()
    {
        return $this->_properties['professor_id'];
    }

    /**
     * Get the type_id
     * @return int id
     */
    public function getTypeId()
    {
        return $this->_properties['type_id'];
    }

    /**
     * Get the name
     *
     * @return string name
     */
    public function getName()
    {
        return $this->_properties['name'];
    }

    /**
     * Get the project
     *
     * @return object project
     */
    public function getProject()
    {
        return $this->_properties['project'];
    }

    /**
     * Get the description
     *
     * @return string description
     */
    public function getDescription()
    {
        return $this->_properties['description'];
    }

    /**
     * Get the competence
     *
     * @return string competence
     */
    public function getCompetence()
    {
        return $this->_properties['competence'];
    }

    /**
     * Get the internNbr
     *
     * @return int internNbr
     */
    public function getInternNbr()
    {
        return $this->_properties['internNbr'];
    }

    /**
     * Get the number of remaining places
     *
     * @return int places
     */
    public function getRemainingPlaces()
    {
        $count = 0;
        foreach ($this->getApplications() as $application) {
            if ($application->getAccepted()) {
                $count += 1;
            }
        }
        return $this->getInternNbr() - $count;
    }

    /**
     * Get the applications
     *
     * @return array applications
     */
    public function getApplications()
    {
        return $this->_properties['applications'];
    }

    /**
     * Get the session
     *
     * @return string session
     */
    public function getSession()
    {
        // @codingStandardsIgnoreStart
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
        // @codingStandardsIgnoreEnd
    }

    /**
     * Get the length
     *
     * @return string length
     */
    public function getLength()
    {
        // @codingStandardsIgnoreStart
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
        // @codingStandardsIgnoreEnd
    }

    /**
     * Get the mission_levels
     *
     * @return array mission_levels
     */
    public function getLevels()
    {
        return $this->_properties['mission_levels'];
    }

    /**
     * Get the type_missions
     *
     * @return array type_misssions
     */
    public function getType()
    {
        return $this->_properties['type_mission'];
    }

    /**
     * Get the mentor
     *
     * @return object user
     */
    public function getMentor()
    {
        return $this->_properties['user'];
    }

    /**
     * Get the professor
     *
     * @return object user
     */
    public function getProfessor()
    {
        return $this->_properties['professor'];
    }

    /**
     * Set the projectId
     *
     * @param int $projectId projectId
     *
     * @return int projectId
     */
    public function editProjectId($projectId)
    {
        $this->set('project_id', $projectId);
        return $projectId;
    }

    /**
     * Set the mentorId
     *
     * @param int $mentorId mentorId
     *
     * @return int mentorId
     */
    public function editMentorId($mentorId)
    {
        $this->set('mentor_id', $mentorId);
        return $mentorId;
    }

    /**
     * Set the professorId
     *
     * @param int $professorId professorId
     *
     * @return int professorId
     */
    public function editProfessorId($professorId)
    {
        $this->set('professor_id', $professorId);
        return $professorId;
    }

    public function editInternNbr($internNbr)
    {
        $this->set('internNbr', $internNbr);
        return $internNbr;
    }

    /**
     * Set if the mission is archived
     *
     * @param int $archived archived
     *
     * @return int archived
     */
    public function editArchived($archived)
    {
        $this->set('archived', $archived);
        return $archived;
    }

    /**
     * Get if the mission is archived
     *
     * @return bool archived
     */
    public function isArchived()
    {
        $projects = TableRegistry::get('Projects');
        $project = $projects->get($this->project_id);

        if ($project->isArchived()) {
            return true;
        }

        if ($this->_properties['archived'] == true) {
            return true;
        }

        return false;
    }
}
