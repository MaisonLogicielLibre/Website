<?php
/**
 * Entity of UsersTable
 *
 * @category Entity
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
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
class User extends Entity
{

    public $hasAndBelongsToMany = ['TypeUsers'];

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
        'id' => false
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
     * Get the first name
     * @return string firstName
     */
    public function getFirstName()
    {
        return $this->_properties['firstName'];
    }
    
    /**
     * Get the last name
     * @return string lastName
     */
    public function getLastName()
    {
        return $this->_properties['lastName'];
    }

    /**
     * Get the full name
     * @return string fullName
     */
    public function getName()
    {
        if (empty($this->_properties['firstName']) || empty($this->_properties['lastName'])) {
            return null;
        } else {
            return $this->_properties['firstName'] . ' ' . $this->_properties['lastName'];
        }
    }

    /**
     * Get the biography
     * @return string biography
     */
    public function getBiography()
    {
        return $this->_properties['biography'];
    }
    
    /**
     * Get the portfolio
     * @return string portfolio
     */
    public function getPortfolio()
    {
        return $this->_properties['portfolio'];
    }
    
    /**
     * Get the email
     * @return string email
     */
    public function getEmail()
    {
        return $this->_properties['email'];
    }

    /**
     * Get the censored email
     * @return string email
     */
    public function getCensoredEmail()
    {
        $email = $this->_properties['email'];
        $email = str_split($email);

        $emailCensored = "";
        $hostname = true;
        foreach ($email as $letter) {
            if ($letter == '@') {
                $hostname = false;
            }
            if ($hostname) {
                $emailCensored = $emailCensored . '*';
            } else {
                $emailCensored = $emailCensored . $letter;
            }
        }
        return $emailCensored;
    }

    /**
     * Get the avatar
     * @return string link
     */
    public function getAvatar()
    {
        $gravatarLink = 'http://www.gravatar.com/avatar/' . md5($this->getEmail()) . '?s=512';
        return $gravatarLink;
    }
    
    /**
     * Get the first phone number
     * @return string phone
     */
    public function getPhone()
    {
        return $this->_properties['phone'];
    }
    
    /**
     * Get the gender
     * @return int gender
     */
    public function getGender()
    {
        $data = $this->_properties['gender'];

        if ($data === false || $data === 0) {
            return 0;
        } elseif ($data === true || $data === 1) {
            return 1;
        } else {
            return null;
        }
    }
    
    /**
     * Get the password
     * @return string password
     */
    public function getPassword()
    {
        return $this->_properties['password'];
    }
    
    /**
     * Get the username
     * @return string username
     */
    public function getUsername()
    {
        return $this->_properties['username'];
    }

    /**
     * Get the university
     * @return object university
     */
    public function getUniversity()
    {
        return $this->_properties['university'];
    }

    /**
     * Get isAvailableMentoring
     * @return bool isAvailableMentoring
     */
    public function isAvailableMentoring()
    {
        return $this->_properties['isAvailableMentoring'];
    }

    /**
     * Get isStudent
     * @return bool isStudent
     */
    public function isStudent()
    {
        return $this->_properties['isStudent'];
    }

    /**
     * Set the first name
     * @param  string $firstName firstName
     * @return string firstName
     */
    public function editFirstName($firstName)
    {
        $this->set('firstname', $firstName);
        return $firstName;
    }
    
    /**
     * Set the last name
     * @param  string $lastName lastName
     * @return string lastName
     */
    public function editLastName($lastName)
    {
        $this->set('lastname', $lastName);
        return $lastName;
    }
    
    /**
     * Set the biography
     * @param  string $biography biography
     * @return string biography
     */
    public function editBiography($biography)
    {
        $this->set('biography', $biography);
        return $biography;
    }
    
    /**
     * Set the portfolio
     * @param  string $portfolio portfolio
     * @return string protfolio
     */
    public function editPortfolio($portfolio)
    {
        $this->set('portfolio', $portfolio);
        return $portfolio;
    }
    
    /**
     * Set the email
     * @param  string $email email
     * @return string email
     */
    public function editEmail($email)
    {
        $this->set('email', $email);
        return $email;
    }

    /**
     * Set the phone number
     * @param  string $phone phone number
     * @return string phone
     */
    public function editPhone($phone)
    {
        $this->set('phone', $phone);
        return $phone;
    }
    
    /**
     * Set the gender
     * @param  int $gender gender
     * @return int gender
     */
    public function editGender($gender)
    {
        if ($gender == "null") {
            $gender = null;
        }
        $this->set('gender', $gender);
        return $gender;
    }
    
    /**
     * Set the password
     * @param  string $password password
     * @return string hashed password
     */
    public function editPassword($password)
    {
        $pass = (new DefaultPasswordHasher)->hash($password);
        $this->set('password', $pass);
        return $pass;
    }

    /**
     * Set the username
     * @param  string $username username
     * @return string username
     */
    public function editUsername($username)
    {
        $this->set('username', $username);
        return $username;
    }

    /**
     * Set isAvailableMentoring
     * @param bool $isAvailableMentoring isAvailableMentoring
     * @return bool isAvailableMentoring
     */
    public function editisAvailableMentoring($isAvailableMentoring)
    {
        $this->set('isAvailableMentoring', $isAvailableMentoring);
        return $isAvailableMentoring;
    }

    /**
     * Set isStudent
     * @param bool $isStudent isStudent
     * @return bool isStudent
     */
    public function editIsStudent($isStudent)
    {
        $this->set('isStudent', $isStudent);
        return $isStudent;
    }

    /**
     * Check if the user has the role specified
     * @param string $permission the permission required to open the page
     * @return bool
     */
    public function hasRoleName($permission)
    {
        $roles = TableRegistry::get('TypeUsersUsers');

        $roles = $roles->find('all')->where(['user_id' => $this->getId()])->contain(['TypeUsers'])->toArray();

        foreach ($roles as $role) {
            if (in_array($role->type_user->name, $permission)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if the user has the permission specified
     * @param array $permission permissions required to open the page
     * @return bool
     */
    public function hasPermissionName($permission)
    {
        $permissions = $this->getPermissions();

        if (empty($permission)) {
            return true;
        }

        foreach ($permissions as $perm) {
            if (in_array($perm->name, $permission)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get permissions of user
     * @return array
     */
    public function getPermissions()
    {
        $roles = TableRegistry::get('TypeUsersUsers');
        $permissions = TableRegistry::get('PermissionsTypeUsers');
        
        $listRolesUser = $this->getRoles();
    
        $listPermissions = [];
        foreach ($listRolesUser as $role) {
            $rolePermissions = $permissions->find('all')->where(['type_user_id' => $role->id])->contain(['Permissions'])->toArray();
            foreach ($rolePermissions as $permission) {
                $listPermissions[] = $permission->permission;
            }
        }
    
        return $listPermissions;
    }

    /**
     * Get roles of user
     * @return array
     */
    public function getRoles()
    {
        // Role fix
        $roles = TableRegistry::get('TypeUsersUsers');
        $rolesUser = $roles->find('all')->where(['user_id' => $this->getId()])->contain(['TypeUsers'])->toArray();

        $listRolesUser = [];
    
        foreach ($rolesUser as $role) {
            $listRolesUser[] = $role->type_user;
        }
        
            

        // Role dynamic
        $roles = TableRegistry::get('TypeUsers');

        if (!empty($this->getProjectsMentored())) {
            $listRolesUser[] = $roles->findByName('Dyn_mentor')->first();
        }
        
        if (!empty($this->getOrganizationsOwned())) {
            $listRolesUser[] = $roles->findByName('Dyn_OrganizationOwner')->first();
        }
        
        if (!empty($this->getOrganizationsJoined())) {
            $listRolesUser[] = $roles->findByName('Dyn_OrganizationMember')->first();
        }
        
        return $listRolesUser;
    }

    /**
     * Get projects where user is mentor
     * @return array
     */
    public function getProjectsMentored()
    {
        $projects = TableRegistry::get('ProjectsMentors');
        $projects = $projects->find('all')->where(['user_id' => $this->getId()])->contain(['Projects'])->toArray();

        $listProject = [];
        foreach ($projects as $project) {
            $listProject[] = $project->project;
        }

        return $listProject;
    }
    
    /**
     * Get organizations where user is owner
     * @return array
     */
    public function getOrganizationsOwned()
    {
        $organizations = TableRegistry::get('OrganizationsOwners');
        $organizations = $organizations->find('all')->where(['user_id' => $this->getId()])->contain(['Organizations'])->toArray();
        
        $listOrganization = [];
        foreach ($organizations as $organization) {
            $listOrganization[] = $organization->organization;
        }
        
        return $listOrganization;
    }
    
    /**
     * Get organizations where user is member
     * @return array
     */
    public function getOrganizationsJoined()
    {
        $organizations = TableRegistry::get('OrganizationsMembers');
        $organizations = $organizations->find('all')->where(['user_id' => $this->getId()])->contain(['Organizations'])->toArray();

        $listOrganization = [];
        foreach ($organizations as $organization) {
            $listOrganization[] = $organization->organization;
        }

        return $listOrganization;
    }

    /**
     * Get if the user is mentor on the project in argument
     * @param Project $projectId projectID
     * @return array
     */
    public function isMentorOf($projectId)
    {
        $listProject = $this->getProjectsMentored();
        foreach ($listProject as $project) {
            if ($project->id == $projectId) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Get if the user is owner of the organization in argument
     * @param Project $orgId orgID
     * @return array
     */
    public function isOwnerOf($orgId)
    {
        $listOrg = $this->getOrganizationsOwned();
        foreach ($listOrg as $org) {
            if ($org->id == $orgId) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Get if the user is member of the organization in argument
     * @param Project $orgId orgID
     * @return array
     */
    public function isMemberOf($orgId)
    {
        $listOrg = $this->getOrganizationsJoined();
        foreach ($listOrg as $org) {
            if ($org->id == $orgId) {
                return true;
            }
        }
        return false;
    }
}
