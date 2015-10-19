<?php
namespace App\Model\Table;

use App\Model\Entity\Mission;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Missions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Projects
 * @property \Cake\ORM\Association\BelongsTo $Mentors
 * @property \Cake\ORM\Association\BelongsToMany $MissionLevels
 * @property \Cake\ORM\Association\BelongsToMany $TypeMissions
 */
class MissionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('missions');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'mentor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('MissionLevels', [
            'foreignKey' => 'mission_id',
            'targetForeignKey' => 'mission_level_id',
            'joinTable' => 'missions_mission_levels'
        ]);
        $this->belongsToMany('TypeMissions', [
            'foreignKey' => 'mission_id',
            'targetForeignKey' => 'type_mission_id',
            'joinTable' => 'missions_type_missions'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('session', 'valid', ['rule' => 'numeric'])
            ->requirePresence('session', 'create')
            ->notEmpty('session');

        $validator
            ->add('length', 'valid', ['rule' => 'numeric'])
            ->requirePresence('length', 'create')
            ->notEmpty('length');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('competence', 'create')
            ->notEmpty('competence');

        $validator
            ->add('internNbr', 'valid', ['rule' => 'numeric'])
            ->requirePresence('internNbr', 'create')
            ->notEmpty('internNbr');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->existsIn(['mentor_id'], 'Users'));
        return $rules;
    }
}
