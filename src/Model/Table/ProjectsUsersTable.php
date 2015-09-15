<?php
/**
 * ProjectsUsers Model
 *
 * @category Table
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */
namespace App\Model\Table;

use App\Model\Entity\ProjectsUser;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectsUsers Model
 *
 * @category Table
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Projects
 * @property \Cake\ORM\Association\HasMany $Comments
 * @property \Cake\ORM\Association\BelongsToMany $Missions
 */
class ProjectsUsersTable extends Table
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

        $this->table('projects_users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo(
            'Users',
            [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
            ]
        );
        $this->belongsTo(
            'Projects',
            [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
            ]
        );
        $this->hasMany(
            'Comments',
            [
            'foreignKey' => 'projects_user_id'
            ]
        );
        $this->belongsToMany(
            'Missions',
            [
            'foreignKey' => 'projects_user_id',
            'targetForeignKey' => 'mission_id',
            'joinTable' => 'projects_users_missions'
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
            ->requirePresence('cv', 'create')
            ->notEmpty('cv');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('presentation', 'create')
            ->notEmpty('presentation');

        $validator
            ->add('accepted', 'valid', ['rule' => 'numeric'])
            ->requirePresence('accepted', 'create')
            ->notEmpty('accepted');

        $validator
            ->add('is_mentor', 'valid', ['rule' => 'numeric'])
            ->requirePresence('is_mentor', 'create')
            ->notEmpty('is_mentor');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        return $rules;
    }
}
