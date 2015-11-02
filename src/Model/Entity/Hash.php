<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hash Entity.
 *
 * @property int $id
 * @property string $hash
 * @property bool $used
 * @property int $time
 * @property \Cake\I18n\Time $created
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\HashType $hash_type
 */
class Hash extends Entity
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
     * Get the user id
     *
     * @return int $user
     */
    public function getUserId()
    {
        return $this->_properties['user_id'];
    }

    /**
     * Get the type id
     *
     * @return int $type
     */
    public function getTypeId()
    {
        return $this->_properties['hash_type_id'];
    }

    /**
     * Check if the hash is already used
     *
     * @return bool $used
     */
    public function isUsed()
    {
        return $this->_properties['used'];
    }

    /**
     * Check if the hash is expired
     *
     * @return bool $expired
     */
    public function isExpired()
    {
        $created = $this->_properties['created'];
        $time = $this->_properties['time'];

        $now = time();
        $timeOfExpiration = $created->toUnixString() + $time;

        if ($timeOfExpiration < $now) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * Set the hash
     *
     * @param string $hash hash
     *
     * @return String $hash hash
     */
    public function setHash($hash)
    {
        $this->set('hash', $hash);
        return $hash;
    }

    /**
     * Set the user
     *
     * @param  User $user user
     *
     * @return User $user user
     */
    public function setUser($user)
    {
        $this->set('user_id', $user->id);
        return $user;
    }

    /**
     * Set the type
     *
     * @param  HashType $type type
     *
     * @return HashType $type type
     */
    public function setType($type)
    {
        $this->set('hash_type_id', $type->id);
        return $type;
    }

    /**
     * Set if the hash is used
     *
     * @param bool $used used
     *
     * @return bool $used used
     */
    public function setUsed($used)
    {
        $this->set('used', $used);
        return $used;
    }
}
