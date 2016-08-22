<?php
/**
 * UsersTypeMission
 *
 * @category Table
 * @package  Website
 * @author   Félix Leblanc <felix.leblanc1305@gmail.com>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Model\Table;

use App\Model\Entity\UsersTypeMission;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersTypeMission
 *
 * @category Table
 * @package  Website
 * @author   Félix Leblanc <felix.leblanc1305@gmail.com>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class UsersTypeMissionsTable extends Table
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

        $this->table('users_type_missions');
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
            'TypeMissions',
            [
                'foreignKey' => 'type_mission_id',
                'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['type_mission_id'], 'TypeMissions'));

        return $rules;
    }
}
