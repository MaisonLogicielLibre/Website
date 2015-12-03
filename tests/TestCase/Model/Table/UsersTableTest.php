<?php
/**
 * Tests for UsersTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for UsersTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class UsersTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
    'app.type_users_users',
    'app.organizations',
    'app.organizations_Projects',
    'app.organizations_Members',
    'app.organizations_Owners',
    'app.users',
    'app.type_users',
    'app.svn_users',
    'app.svns',
    'app.universities',
    'app.comments',
    'app.projects',
    'app.projects_contributors',
    'app.projects_mentors',
    'app.missions'
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Users') ? [] : ['className' => 'App\Model\Table\UsersTable'];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

        parent::tearDown();
    }

    /**
     * Test getId
     * @return void
     */
    public function testGetId()
    {
        $id = 1;
        $expected = 1;

        $user = $this->Users->get($id);

        $result = $user->getId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getFirstName
     * @return void
     */
    public function testGetFirstName()
    {
        $id = 1;
        $expected = 'Simon';
        
        $user = $this->Users->get($id);
        
        $result = $user->getFirstName();
        
        $this->assertEquals($expected, $result);
    }

    /**
     * Test getNameNUll
     * @return void
     */
    public function testGetNameNull()
    {
        $id = 3;
        $expected = null;

        $user = $this->Users->get($id);

        $result = $user->getName();

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getLastName
     * @return void
     */
    public function testGetLastName()
    {
        $id = 1;
        $expected = 'Begin';
        
        $user = $this->Users->get($id);
        
        $result = $user->getLastName();
        
        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getBiography
     * @return void
     */
    public function testGetBiography()
    {
        $id = 1;
        $expected = 'Une petite bio.';
        
        $user = $this->Users->get($id);
        
        $result = $user->getBiography();
        
        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getPortfolio
     * @return void
     */
    public function testGetPortfolio()
    {
        $id = 1;
        $expected = 'http://monportfolio.com';
        
        $user = $this->Users->get($id);
        
        $result = $user->getPortfolio();
        
        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getEmail
     * @return void
     */
    public function testGetEmail()
    {
        $id = 1;
        $expected = 'email@gmail.com';
        
        $user = $this->Users->get($id);
        
        $result = $user->getEmail();
        
        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getPhone
     * @return void
     */
    public function testGetPhone()
    {
        $id = 1;
        $expected = '(514) 777-7777';
        
        $user = $this->Users->get($id);
        
        $result = $user->getPhone();
        
        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getGender for true
     * @return void
     */
    public function testGetGenderTrue()
    {
        $id = 1;
        $expected = true;
        
        $user = $this->Users->get($id);
        
        $result = $user->getGender();
        
        $this->assertEquals($expected, $result);
    }

    /**
     * Test getGender for false
     * @return void
     */
    public function testGetGenderFalse()
    {
        $id = 2;
        $expected = false;

        $user = $this->Users->get($id);

        $result = $user->getGender();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getGender for null
     * @return void
     */
    public function testGetGenderNull()
    {
        $id = 3;
        $expected = null;

        $user = $this->Users->get($id);

        $result = $user->getGender();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getPassword
     * @return void
     */
    public function testGetPassword()
    {
        $id = 1;
        $expected = 'motdepasse';
        
        $user = $this->Users->get($id);
        
        $result = $user->getPassword();
        
        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test getUsername
     * @return void
     */
    public function testGetUsername()
    {
        $id = 1;
        $expected = 'tropHot';
        
        $user = $this->Users->get($id);
        
        $result = $user->getUsername();
        
        $this->assertEquals($expected, $result);
    }

    /**
     * Test IsAvailableMentoring
     * @return void
     */
    public function testIsAvailableMentoring()
    {
        $id = 1;
        $expected = 0;

        $user = $this->Users->get($id);

        $result = $user->isAvailableMentoring();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test IsStudent
     * @return void
     */
    public function testIsStudent()
    {
        $id = 1;
        $expected = 1;

        $user = $this->Users->get($id);

        $result = $user->isStudent();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editFirstName
     * @return void
     */
    public function testSetFirstName()
    {
        $id = 1;
        $expected = 'Simon';

        $user = $this->Users->get($id);

        $result = $user->editFirstName($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editLastName
     * @return void
     */
    public function testSetLastName()
    {
        $id = 1;
        $expected = 'Begin';

        $user = $this->Users->get($id);

        $result = $user->editLastName($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editBiography
     * @return void
     */
    public function testSetBiography()
    {
        $id = 1;
        $expected = 'Une petite bio.';

        $user = $this->Users->get($id);

        $result = $user->editBiography($expected);

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editPortfolio
     * @return void
     */
    public function testSetPortfolio()
    {
        $id = 1;
        $expected = 'http://monportfolio.com';

        $user = $this->Users->get($id);

        $result = $user->editPortfolio($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editEmail
     * @return void
     */
    public function testSetEmail()
    {
        $id = 1;
        $expected = 'email@gmail.com';

        $user = $this->Users->get($id);

        $result = $user->editEmail($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editPhone
     * @return void
     */
    public function testSetPhone()
    {
        $id = 1;
        $expected = '(514) 777-7777';

        $user = $this->Users->get($id);

        $result = $user->editPhone($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editGender
     * @return void
     */
    public function testSetGender()
    {
        $id = 1;
        $expected = 1;

        $user = $this->Users->get($id);

        $result = $user->editGender($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editGender
     * @return void
     */
    public function testSetGenderNull()
    {
        $id = 1;
        $expected = null;

        $user = $this->Users->get($id);

        $result = $user->editGender("null");

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editUsername
     * @return void
     */
    public function testSetUsername()
    {
        $id = 1;
        $expected = 'trophot';

        $user = $this->Users->get($id);

        $result = $user->editUsername($expected);

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test editpassword
     * @return void
     */
    public function testSetPassword()
    {
        $id = 1;
        $pass = 'allo';

        $user = $this->Users->get($id);

        $result = $user->editPassword('allo');
        $check = (new DefaultPasswordHasher)->check($pass, $result);

        $this->assertTrue($check);
    }

    /**
     * Test editMailingList
     * @return void
     */
    public function testSetMailingList()
    {
        $id = 1;
        $expected = 1;

        $user = $this->Users->get($id);

        $result = $user->editMailingList($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editIsAvailableMentoring
     * @return void
     */
    public function testSetIsAvailableMentoring()
    {
        $id = 1;
        $expected = 1;

        $user = $this->Users->get($id);

        $result = $user->editIsAvailableMentoring($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editIsStudent
     * @return void
     */
    public function testSetIsStudent()
    {
        $id = 1;
        $expected = 0;

        $user = $this->Users->get($id);

        $result = $user->editIsStudent($expected);

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test hasRoleName
     * @return void
     */
    public function testHasRoleNameTrue()
    {
        $id = 2;
        $perm = [
        1 => 'Administrator'
        ];

        $user = $this->Users->get($id);
        
        
        $result = $user->hasRoleName($perm);

        $this->assertTrue($result);
    }
    
    /**
     * Test hasRoleName
     * @return void
     */
    public function testHasRoleNameFalse()
    {
        $id = 1;
        $perm = [
        1 => 'blarg'
        ];

        $user = $this->Users->get($id);

        $result = $user->hasRoleName($perm);

        $this->assertFalse($result);
    }
    
    /**
     * Test validation
     * @return void
     */
    public function testValidation()
    {
        $validator = new Validator();
        
        $expected = $validator;
        
        $result = $this->Users->validationDefault($validator);
        
        $this->assertEquals($validator, $result);
    }
    
    /**
     * Test buildRules
     * @return void
     */
    public function testBuildRules()
    {
        $rule = new RulesChecker();
        
        $expected = $rule;
        
        $result = $this->Users->buildRules($rule);
        
        $this->assertEquals($expected, $result);
    }

    /**
     * Test fail validation
     * @return void
     */
    public function testValidationFail()
    {
        $id = 1;
        $user = $this->Users->get($id);

        $data = [
                'portfolio' => 'www.github.com',
                'email' => 'test@email.com',
                'confirm_email' => 'test2@email.com',
                'phone' => '111111111111',
                'password' => 'allo',
                'confirm_password' => 'allo2'
            ];

            $this->Users->patchEntity($user, $data);
            $result = $this->Users->save($user);

        if ($result != false) {
            $result = true;
        }

            $this->assertFalse($result);
    }
    
    /**
     * Test isOwner - True
     * @return void
     */
    public function testIsOwnerTrue()
    {
        $userId = 1;
        $orgId = 1;
        $expected = true;

        $user = $this->Users->get($userId);
        
        $result = $user->isOwnerOf($orgId);
        
        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test isOwner - False
     * @return void
     */
    public function testIsOwnerFalse()
    {
        $userId = 2;
        $orgId = 1;
        $expected = false;

        $user = $this->Users->get($userId);
        
        $result = $user->isOwnerOf($orgId);
        
        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test isMember - True
     * @return void
     */
    public function testIsMemberTrue()
    {
        $userId = 1;
        $orgId = 1;
        $expected = true;

        $user = $this->Users->get($userId);
        
        $result = $user->isMemberOf($orgId);
        
        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test isMember - False
     * @return void
     */
    public function testIsMemberFalse()
    {
        $userId = 2;
        $orgId = 1;
        $expected = false;

        $user = $this->Users->get($userId);
        
        $result = $user->isMemberOf($orgId);
        
        $this->assertEquals($expected, $result);
    }
}
