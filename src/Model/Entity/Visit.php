<?php
/**
 * Entity of VisitsTable
 *
 * @category Table
 * @package  Website
 * @author   Felix Leblanc <felix.leblanc1305@gmail.com>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entity of VisitsTable
 *
 * @category Table
 * @package  Website
 * @author   Felix Leblanc <felix.leblanc1305@gmail.com>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class Visit extends Entity
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
}
