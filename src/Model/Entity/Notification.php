<?php
/**
 * Entity of NotificationsTable
 *
 * @category Entity
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entity of OrganizationsTable
 *
 * @category Entity
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class Notification extends Entity
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
     * Get the user
     * @return objet user
     */
    public function getUser()
    {
        return $this->_properties['user'];
    }

    /**
     * Get the link
     * @return string link
     */
    public function getLink()
    {
        return $this->_properties['link'];
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
     * Set the user
     * @param  object $user user
     * @return object user
     */
    public function editUser($user)
    {
        $this->set('user', $user);
        return $user;
    }

    /**
     * Set the link
     * @param  string $link link
     * @return string link
     */
    public function editLink($link)
    {
        $this->set('link', $link);
        return $link;
    }
}
