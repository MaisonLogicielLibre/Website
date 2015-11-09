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
use Cake\Auth\DefaultPasswordHasher;
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
                'joinType' => 'LEFT'
            ]
        );
        $this->hasMany(
            'Comments',
            [
                'foreignKey' => 'user_id'
            ]
        );
        $this->hasMany(
            'Hashes',
            [
                'foreignKey' => 'user_id'
            ]
        );
        $this->hasMany(
            'Applications',
            [
                'foreignKey' => 'user_id'
            ]
        );
        $this->belongsToMany(
            'Projects',
            [
                'foreignKey' => 'user_id',
                'targetForeignKey' => 'project_id',
                'joinTable' => 'projects_contributors'
            ]
        );
        $this->belongsToMany(
            'ProjectsMentored',
            [
                'className' => 'Projects',
                'foreignKey' => 'user_id',
                'targetForeignKey' => 'project_id',
                'joinTable' => 'projects_mentors'
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
            ->notEmpty('firstName');

        $validator
            ->notEmpty('lastName');

        $validator
            ->allowEmpty('biography');

        $validator
            ->allowEmpty('portfolio')
            ->add(
                'portfolio',
                'custom',
                [
                    'rule' => function ($value) {
                        if (!preg_match('/^(https?):\/\/(.*)\.(.+)/', $value)) {
                            return false;
                        }
                        return true;
                    },
                    'message' => __('Is not an url (Ex : http://website.ca).')
                ]
            );

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add(
                'email',
                'unique',
                [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => __('This email is already taken.')
                ]
            )
            ->add(
                'confirm_email',
                'custom',
                [
                'rule' => function ($value, $context) {
                    if ($value !== $context['data']['email']) {
                        return false;
                    }
                    return true;
                },
                'message' => 'The email are not equal']
            )
            ->requirePresence('confirm_email', 'create')
            ->notEmpty('confirm_email');

        $validator
            ->allowEmpty('phone')
            ->add(
                'phone',
                'custom',
                [
                    'rule' => function ($value) {
                        if (!preg_match('/^([0-9]{1}(\.|\s|-)?){10}$/', $value)) {
                            return false;
                        }
                        return true;
                    },
                    'message' => __('Is not a valid number.')
                ]
            );

        $validator
            ->add('gender', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('gender');

        $validator
            ->add(
                'confirm_password',
                'custom',
                [
                'rule' => function ($value, $context) {
                    if ($value !== $context['data']['password']) {
                        return false;
                    }
                    return true;
                },
                'message' => 'The passwords are not equal']
            )
            ->requirePresence('password', 'create')
            ->notEmpty('password')
            ->notEmpty('confirm_password');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add(
                'username',
                [
                    'unique' => [
                        'rule' => 'validateUnique',
                        'provider' => 'table',
                        'message' => __('This username is already taken.')
                    ],
                    'custom' => [
                        'rule' => function ($value) {
                            if (!preg_match('/^([a-z0-9A-Z_\-.])*$/', $value)) {
                                return false;
                            }
                            return true;
                        },
                        'message' => __('Please use only letters (a-z), numbers, periods, and underscore.')
                    ],
                    'between' => [
                        'rule' => ['lengthBetween', 3, 16],
                        "message" => __('Please use between 3 and 16 characters.')
                    ]
                ]
            );

        $validator
            ->add(
                'old_password',
                'custom',
                [
                    'rule' => function ($value, $context) {
                        $query = $this->find()
                            ->where(
                                [
                                    'id' => $context['data']['id']
                                    ]
                            )
                            ->first();
                        $data = $query->toArray();

                        return (new DefaultPasswordHasher)->check($value, $data['password']);
                    },
                    'message' => __(' Old password isn\'t valid')]
            );

        $validator
            ->add('isAvailableMentoring', 'valid', ['rule' => 'boolean']);

        $validator
            ->add('isStudent', 'valid', ['rule' => 'boolean']);

        $validator
            ->requirePresence('universitie_id', 'create')
            ->notEmpty('universitie_id');

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
        return $rules;
    }
}
