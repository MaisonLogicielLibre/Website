<?php
/**
 * Users Model
 *
 * @category Table
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */

namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @category Table
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
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
                'foreignKey' => 'university_id',
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
        $this->hasMany(
            'SvnUsers',
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
        $this->belongsToMany(
            'Owners',
            [
                'className' => 'Organizations',
                'foreignKey' => 'user_id',
                'targetForeignKey' => 'organization_id',
                'joinTable' => 'organizations_owners'
            ]
        );
        $this->belongsToMany(
            'Members',
            [
                'className' => 'Organizations',
                'foreignKey' => 'user_id',
                'targetForeignKey' => 'organization_id',
                'joinTable' => 'organizations_members'
            ]
        );
        $this->belongsToMany(
            'TypeMissions',
            [
                'className' => 'TypeMissions',
                'foreignKey' => 'user_id',
                'targetForeignKey' => 'type_mission_id',
                'joinTable' => 'users_type_missions'
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
            ->allowEmpty('twitter');

        $validator
            ->allowEmpty('facebook');

        $validator
            ->allowEmpty('googlePlus')
            ->add(
                'googlePlus',
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
            ->allowEmpty('linkedIn')
            ->add(
                'linkedIn',
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
                        'message' => __('Please use only letters (a-z), numbers,periods, and underscore.')
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
            ->requirePresence('university_id', 'create')
            ->notEmpty('university_id');

        $validator
            ->add(
                'skills',
                'custom',
                [
                    'rule' => function ($value) {
                        $json = json_decode(file_get_contents(WWW_ROOT . '/json/UsersSkills.json'), true);
                        $valueArray = array_map(
                            function ($o) {
                                return ltrim($o, ' ');

                            },
                            explode(',', $value)
                        );
                        if (count(array_diff($valueArray, $json)) > 0) {
                            return false;
                        }
                        return true;
                    },
                    'message' => __('One or more skills are not recognized')
                ]
            )
            ->allowEmpty('skills');

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

    /**
     * FindTypeOptions method
     *
     * @param Query $query query
     *
     * @return array
     */
    public function findTypeOptions(Query $query)
    {
        $typeMissions = TableRegistry::get('TypeMissions');
        return $typeMissions->find('options');
    }
}
