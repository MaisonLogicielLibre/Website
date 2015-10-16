<?php
namespace App\Model\Table;

use App\Model\Entity\MissionsTypeMission;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MissionsTypeMissions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TypeMissions
 * @property \Cake\ORM\Association\BelongsTo $Missions
 */
class MissionsTypeMissionsTable extends Table
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

        $this->table('missions_type_missions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('TypeMissions', [
            'foreignKey' => 'type_mission_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Missions', [
            'foreignKey' => 'mission_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['type_mission_id'], 'TypeMissions'));
        $rules->add($rules->existsIn(['mission_id'], 'Missions'));
        return $rules;
    }
}
