<?php
/**
 * Statistic Model
 *
 * @category Table
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Model\Table;

use App\Model\Entity\Statistic;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Statistic Model
 *
 * @category Table
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class StatisticsTable extends Table
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

        $this->table('statistics');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->add('commits', 'valid', ['rule' => 'numeric'])
            ->requirePresence('commits', 'create')
            ->notEmpty('commits');

        $validator
            ->add('pull_requests_open', 'valid', ['rule' => 'numeric'])
            ->requirePresence('pull_requests_open', 'create')
            ->notEmpty('pull_requests_open');

        $validator
            ->add('pull_requests_close', 'valid', ['rule' => 'numeric'])
            ->requirePresence('pull_requests_close', 'create')
            ->notEmpty('pull_requests_close');

        $validator
            ->add('issues_open', 'valid', ['rule' => 'numeric'])
            ->requirePresence('issues_open', 'create')
            ->notEmpty('issues_open');

        $validator
            ->add('issues_close', 'valid', ['rule' => 'numeric'])
            ->requirePresence('issues_close', 'create')
            ->notEmpty('issues_close');

        return $validator;
    }
}
