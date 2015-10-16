<?php
namespace App\Model\Table;

use App\Model\Entity\TypeMission;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypeMissions Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Missions
 */
class TypeMissionsTable extends Table
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

        $this->table('type_missions');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsToMany('Missions', [
            'foreignKey' => 'type_mission_id',
            'targetForeignKey' => 'mission_id',
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
