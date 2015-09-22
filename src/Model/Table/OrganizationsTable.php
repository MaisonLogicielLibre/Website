<?php
/**
 * Organizations Model
 *
 * @category Table
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */
namespace App\Model\Table;

use App\Model\Entity\Organization;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Organizations Model
 *
 * @category Table
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 * @property \Cake\ORM\Association\BelongsToMany $Projects
 */
class OrganizationsTable extends Table
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

        $this->table('organizations');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsToMany(
            'Projects',
            [
            'foreignKey' => 'organization_id',
            'targetForeignKey' => 'project_id',
            'joinTable' => 'organizations_projects'
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

        $validator
            ->allowEmpty('website');

        $validator
            ->allowEmpty('logo');

        $validator
            ->allowEmpty('description');

        $validator
            ->notEmpty('isValidated');

        $validator
            ->notEmpty('isRejected');
        return $validator;
    }

    /**
     * Return organizations who are validated and not rejected
     * @param Query $query query
     * @param array $options options
     * @return Query query
     */
    public function findShow(Query $query, array $options) {
        $query->where([
            'Organizations.isValidated' => true,
            'Organizations.isRejected' => false
        ]);
        return $query;
    }
}
