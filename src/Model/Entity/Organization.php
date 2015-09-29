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
     * Get the boolean isValidated
     * @return boolean isValidated
     */
    public function getIsValidated()
    {
        $data = $this->_properties['isValidated'];
        if ($data)
            return 1;
        else
            return 0;
    }

    /**
     * Get the boolean isRejected
     * @return boolean isRejected
     */
    public function getIsRejected()
    {
        $data = $this->_properties['isRejected'];
        if ($data)
            return 1;
        else
            return 0;
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
        return $isRejected;
    }
}
