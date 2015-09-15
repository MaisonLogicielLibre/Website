<?php
/**
 * Entity of UniversitiesTable
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
 * Entity of UniversitiesTable
 *
 * @category Entity
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class University extends Entity
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
     * @return string website
     */
    public function getWebsite()
    {
        return $this->_properties['website'];
    }
    
    /**
     * Set the name
     * @param  string $name name
     * @return string name
     */
    public function editName($name)
    {
        $this->set('name', $name);
        return $name;
    }
    
    /**
     * Set the website
     * @param  string $website website
     * @return string website
     */
    public function editWebsite($website)
    {
        $this->set('website', $website);
        return $website;
    }
}
