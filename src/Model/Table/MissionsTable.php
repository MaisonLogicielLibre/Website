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
 * @property \Cake\ORM\Association\BelongsTo $Professors
 * @property \Cake\ORM\Association\BelongsTo $Types
 * @property \Cake\ORM\Association\HasMany $Applications
 * @property \Cake\ORM\Association\HasMany $Propositions
 * @property \Cake\ORM\Association\BelongsToMany $MissionLevels
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
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo(
            'Professors',
            [
                'className' => 'Users',
                'foreignKey' => 'professor_id',
                'joinType' => 'LEFT'
            ]
        );
        $this->belongsTo('TypeMissions', [
            'foreignKey' => 'type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Applications', [
            'foreignKey' => 'mission_id'
        ]);
        $this->hasMany('Propositions', [
            'foreignKey' => 'mission_id'
        ]);
        $this->belongsToMany('MissionLevels', [
            'foreignKey' => 'mission_id',
            'targetForeignKey' => 'mission_level_id',
            'joinTable' => 'missions_mission_levels'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

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
            ->add(
                'internNbr',
                [
                    'valid' => [
                        'rule' => 'numeric',
                        'message' => __('The value must be a number')
                    ],
                    'range' => [
                        'rule' => ['range', 1, 100],
                        "message" => __('Please enter a number between 1 and 100')
                    ]
                ]
            )
            ->requirePresence('internNbr', 'create')
            ->notEmpty('internNbr');

        $validator
                    ->requirePresence('mission_levels', 'create', ['message' => __('You must select at least one item.')])
                    ->add(
                        'mission_levels',
                        'custom',
                        [
                            'rule' => function ($value, $context) {
                                if (empty($context['data']['mission_levels']['_ids'])) {
                                    return false;
                                }
                                return true;
                            },
                            'message' => __('You must select at least one item.')]
                    );
        $validator
            ->notEmpty('archived');

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
        $rules->add($rules->existsIn(['type_id'], 'TypeMissions'));
        return $rules;
    }
}
