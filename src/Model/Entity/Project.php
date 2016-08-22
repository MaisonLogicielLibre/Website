<?php
/**
 * Entity of ProjectsTable
 *
 * @category Entity
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Entity of UsersTable
 *
 * @category Entity
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class Project extends Entity
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
     *
     * @return int id
     */
    public function getId()
    {
        return $this->_properties['id'];
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
     * Get the link
     *
     * @return string link
     */
    public function getLink()
    {
        return $this->_properties['link'];
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
     * Get the mentors
     *
     * @return array mentors
     */
    public function getMentors()
    {
        return $this->_properties['mentors'];
    }

    /**
     * Get the missions
     *
     * @return array missions
     */
    public function getMissions()
    {
        return $this->_properties['missions'];
    }

    /**
     * Get the organizations
     *
     * @return array organizations
     */
    public function getOrganizations()
    {
        return $this->organization;
    }

    /**
     * Get the contributors
     *
     * @return array contributors
     */
    public function getContributors()
    {
        return $this->_properties['contributors'];
    }

    /**
     * Get if the project is accepted
     *
     * @return int accepted
     */
    public function isAccepted()
    {
        return $this->_properties['accepted'];
    }

    /**
     * Get if the project is archived
     *
     * @return int archived
     */
    public function isArchived()
    {
        return $this->_properties['archived'];
    }

    /**
     * Set the name
     *
     * @param string $name name
     *
     * @return string name
     */
    public function editName($name)
    {
        $this->set('name', $name);

        return $name;
    }

    /**
     * Set the link
     *
     * @param string $link link
     *
     * @return string link
     */
    public function editLink($link)
    {
        $this->set('link', $link);

        return $link;
    }

    /**
     * Set the description
     *
     * @param string $description description
     *
     * @return string description
     */
    public function editDescription($description)
    {
        $this->set('description', $description);

        return $description;
    }

    /**
     * Set if the project is accepted
     *
     * @param int $accepted accepted
     *
     * @return int accepted
     */
    public function editAccepted($accepted)
    {
        $this->set('accepted', $accepted);

        return $accepted;
    }

    /**
     * Set if the project is archived
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
     * Set missions on a project
     *
     * @param array $missions mission
     *
     * @return array missions
     */
    public function editMissions($missions)
    {
        $this->set('missions', $missions);

        return $missions;
    }

    /**
     * Set the mentors
     *
     * @param array $mentors mentors
     *
     * @return array mentors
     */
    public function editMentors($mentors)
    {
        $this->set('mentors', $mentors);

        return $mentors;
    }

    /**
     * Set the created
     *
     * @param string $created created
     *
     * @return string $created
     */
    public function editCreated($created)
    {
        $this->set('created', $created);

        return $created;
    }

    /**
     * Set the modified
     *
     * @param string $modified modified
     *
     * @return string $modified
     */
    public function editModified($modified)
    {
        $this->set('modified', $modified);

        return $modified;
    }

    /**
     * Modify mentors
     *
     * @param array $usersId usersId
     *
     * @return void
     */
    public function modifyMentors($usersId)
    {
        $usersSelected = [];
        $users = TableRegistry::get('Users');

        foreach ($usersId as $id) {
            $user = $users->get($id);
            array_push($usersSelected, $user);
        }

        $this->editMentors($usersSelected);
    }

    /**
     * Check if a mission become mentorless
     *
     * @return null
     */
    public function checkMentorless()
    {
        $missions = $this->getMissions();

        foreach ($this->getMissions() as $mission) {
            foreach ($this->getMentors() as $mentor) {
                if ($mentor->getId() == $mission->getMentorId()) {
                    if (($key = array_search($mission, $missions)) !== false) {
                        unset($missions[$key]);
                    }
                }
            }
        }

        return $missions;
    }
}
