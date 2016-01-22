<?php
/**
 * Applications Model
 *
 * @category Table
 * @package  Website
 * @author   Raphael St-Arnaud <r@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */
namespace App\Model\Table;

use App\Model\Entity\Application;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Applications Model
 *
 * @category Table
 * @package  Website
 * @author   Raphael St-Arnaud <raphael.st-arnaud.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 * @property \Cake\ORM\Association\BelongsTo $Missions
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $TypeMissions
 */
class ApplicationsTable extends Table
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

        $this->table('applications');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo(
            'Missions',
            [
            'foreignKey' => 'mission_id',
            'joinType' => 'INNER'
            ]
        );
        $this->belongsTo(
            'Users',
            [
            'foreignKey' => 'user_id',
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

        $validator
            ->add('accepted', 'valid', ['rule' => 'boolean'])
            ->requirePresence('accepted', 'create')
            ->notEmpty('accepted');

        $validator
            ->add('rejected', 'valid', ['rule' => 'boolean'])
            ->requirePresence('rejected', 'create')
            ->notEmpty('rejected');

        $validator
            ->allowEmpty('text');

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->notEmpty('email');

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
        $rules->add($rules->existsIn(['mission_id'], 'Missions'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
