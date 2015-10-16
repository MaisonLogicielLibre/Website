<?php
namespace App\Model\Table;

use App\Model\Entity\MissionsMissionLevel;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MissionsMissionLevels Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MissionLevels
 * @property \Cake\ORM\Association\BelongsTo $Missions
 */
class MissionsMissionLevelsTable extends Table
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

        $this->table('missions_mission_levels');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('MissionLevels', [
            'foreignKey' => 'mission_level_id',
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
        $rules->add($rules->existsIn(['mission_level_id'], 'MissionLevels'));
        $rules->add($rules->existsIn(['mission_id'], 'Missions'));
        return $rules;
    }
}
