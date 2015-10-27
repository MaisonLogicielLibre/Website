<?php
/**
 * Entity of TypeMissionsTable
 *
 * @category Entity
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entity of TypeMissionsTable
 *
 * @category Entity
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */
class TypeMission extends Entity
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
    protected $accessible = [
        '*' => true,
        'id' => false,
    ];

    /**
     * Get the name
     * @return string name
     */
    public function getName()
    {
        // @codingStandardsIgnoreStart
        switch ($this->_properties['name']) {
            case 'Intern':
                return __('Intern');
                break;
            case 'Volunteer':
                return __('Volunteer');
                break;
            case 'Master':
                return __('Master');
                break;
            case 'Capstone':
                return __('Capstone');
                break;
        }
        // @codingStandardsIgnoreEnd
    }
}
