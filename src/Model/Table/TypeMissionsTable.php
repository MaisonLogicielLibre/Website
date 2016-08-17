<?php
/**
 * TypeMissions Model
 *
 * @category Table
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Model\Table;

use App\Model\Entity\TypeMission;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypeMissions Model
 *
 * @category Table
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class TypeMissionsTable extends Table
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

        $this->table('type_missions');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany(
            'Missions',
            [
                'className' => 'Missions',
                'foreignKey' => 'type_mission_id'
            ]
        );
        $this->hasMany(
            'Applications',
            [
                'className' => 'Applications',
                'foreignKey' => 'type_mission_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }

    /**
     * FindOptions method
     *
     * @param Query $query   query
     * @param array $options options
     *
     * @return array
     */
    public function findOptions(Query $query, array $options)
    {
        $typeMissions = $query->find('all')->toArray();
        $typeOptions = [];
        foreach ($typeMissions as $typeMission) {
            $typeOptions[$typeMission->id] = $typeMission->getName();
        }

        return $typeOptions;
    }
}
