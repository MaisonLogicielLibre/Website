<?php
/**
 * Users Model
 *
 * @category Table
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */

namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @category Table
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 * @property \App\Model\Table\UsersTable $Users
 * @property \Cake\ORM\Association\BelongsTo $Universities
 * @property \Cake\ORM\Association\HasMany $Comments
 * @property \Cake\ORM\Association\BelongsToMany $Projects
 * @property \Cake\ORM\Association\BelongsToMany $TypeUsers
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     *
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo(
            'Universities',
            [
            'foreignKey' => 'universitie_id',
            'joinType' => 'INNER'
            ]
        );
        $this->hasMany(
            'Comments',
            [
            'foreignKey' => 'user_id'
            ]
        );
        $this->belongsToMany(
            'Projects',
            [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'project_id',
            'joinTable' => 'projects_users'
            ]
        );
        $this->belongsToMany(
            'TypeUsers',
            [
            'joinTable' => 'type_users_users'
            ]
        );
    }
    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     *
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
        $validator
            ->requirePresence('firstName', 'create')
            ->notEmpty('firstName');
        $validator
            ->requirePresence('lastName', 'create')
            ->notEmpty('lastName');
        $validator
            ->allowEmpty('biography');
        $validator
            ->allowEmpty('portfolio');
        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email');
        $validator
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');
        $validator
            ->add('gender', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('gender');
        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');
        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');
        return $validator;
    }
    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     *
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['universitie_id'], 'Universities'));
        return $rules;
    }
}
