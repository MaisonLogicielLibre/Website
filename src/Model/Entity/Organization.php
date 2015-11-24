<?php
/**
 * Entity of OrganizationsTable
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
 * Entity of OrganizationsTable
 *
 * @category Entity
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class Organization extends Entity
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
     * Get the name
     * @return string name
     */
    public function getName()
    {
        return $this->_properties['name'];
    }
    
    /**
     * Get the website
     * @return strign website
     */
    public function getWebsite()
    {
        return $this->_properties['website'];
    }
    
    /**
     * Get the logo path
     * @return string logo path
     */
    public function getLogo()
    {
        return $this->_properties['logo'];
    }
    
    /**
     * Get the description
     * @return strign description
     */
    public function getDescription()
    {
        return $this->_properties['description'];
    }
    
    /**
     * Get the owners
     * @return array owners
     */
    public function getOwners()
    {
        return $this->_properties['owners'];
    }
    
    /**
     * Get the members
     * @return array members
     */
    public function getMembers()
    {
        return $this->_properties['members'];
    }

    /**
     * Get the bool isValidated
     * @return bool isValidated
     */
    public function getIsValidated()
    {
        $data = $this->_properties['isValidated'];
        if ($data) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Get the bool isRejected
     * @return bool isRejected
     */
    public function getIsRejected()
    {
        $data = $this->_properties['isRejected'];
        if ($data) {
            return 1;
        } else {
            return 0;
        }
    }
    
    /**
     * Set the name
     * @param string $name name
     * @return string name
     */
    public function editName($name)
    {
        $this->set('name', $name);
        return $name;
    }
    
    /**
     * Set the website
     * @param string $website website
     * @return string website
     */
    public function editWebsite($website)
    {
        $this->set('website', $website);
        return $website;
    }
    
    /**
     * Set the logo path
     * @param string $logo logo
     * @return string logo path
     */
    public function editLogo($logo)
    {
        $this->set('logo', $logo);
        return $logo;
    }
    
    /**
     * Set the description
     * @param string $description description
     * @return string description
     */
    public function editDescription($description)
    {
        $this->set('description', $description);
        return $description;
    }

    /**
     * Set if the organization is validated
     * @param bool $isValidated isValidated
     * @return bool isValidated
     */
    public function editIsValidated($isValidated)
    {
        $this->set('isValidated', $isValidated);
        return $isValidated;
    }

    /**
     * Set if the organization is rejected during validation
     * @param bool $isRejected isRejected
     * @return bool isRejected
     */
    public function editIsRejected($isRejected)
    {
        $this->set('isRejected', $isRejected);
        $ORMprojects = TableRegistry::get('Projects');
        $projects = $ORMprojects
            ->find()
            ->join(
                [
                    'table' => 'organizations_projects',
                    'alias' => 'o',
                    'type' => 'INNER',
                    'conditions' => 'o.project_id = Projects.id'
                ]
            )
            ->where(
                [
                    'o.organization_id' => $this->id
                    ]
            );

        foreach ($projects as $project) {
            $project->editArchived(true);
            $ORMprojects->save($project);
        }

        return $isRejected;
    }
    
    /**
     * Set the owners
     * @param array $owners owners
     * @return array $owners
     */
    public function editOwners($owners)
    {
        $this->set('owners', $owners);
        return $owners;
    }
    
    /**
     * Set the members
     * @param array $members members
     * @return array $members
     */
    public function editMembers($members)
    {
        $this->set('members', $members);
        return $members;
    }
    
    /**
     * Remove a member
     * @param int $usersId usersId
     * @return null
     */
    public function removeMembers($usersId)
    {
        $members = $this->getMembers();
        $nbMembers = count($members);
        
        foreach ($usersId as $id) {
            for ($i = 0; $i < $nbMembers; $i++) {
                if ($members[$i]->getId() == $id) {
                    unset($members[$i]);
                }
            }
        }
        
        
        $this->editMembers($members);
    }
    
    /**
     * Remove owners
     * @param array $usersId usersId
     * @return null
     */
    public function removeOwners($usersId)
    {
        $owners = $this->getOwners();
        $nbOwners = count($owners);
        
        foreach ($usersId as $id) {
            for ($i = 0; $i < $nbOwners; $i++) {
                if ($owners[$i]->getId() == $id) {
                    unset($owners[$i]);
                }
            }
        }
        
        $this->editOwners($owners);
    }
    
    /**
     * Add Owners
     * @param array $usersId usersId
     * @return null
     */
    public function modifyOwners($usersId)
    {
        $usersSelected = [];
        $members = $this->getMembers();
        $users = TableRegistry::get('Users');
        
        foreach ($usersId as $id) {
            $user = $users->get($id);
            array_push($usersSelected, $user);
            array_push($members, $user);
        }
       
        $this->editOwners($usersSelected);

        $members = array_unique($members);
        
        $this->editMembers($members);
    }
    
    /**
     * Add Members
     * @param array $usersId usersId
     * @return null
     */
    public function modifyMembers($usersId)
    {
        $usersSelected = [];
        $members = $this->getMembers();
        $users = TableRegistry::get('Users');

        foreach ($usersId as $id) {
            $user = $users->get($id);
            array_push($usersSelected, $user);
        }
        
        $this->editMembers($usersSelected);
    }
}
