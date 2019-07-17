<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NationalFestivals Model
 *
 * @method \App\Model\Entity\NationalFestival get($primaryKey, $options = [])
 * @method \App\Model\Entity\NationalFestival newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NationalFestival[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NationalFestival|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NationalFestival|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NationalFestival patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NationalFestival[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NationalFestival findOrCreate($search, callable $callback = null, $options = [])
 */
class NationalFestivalsTable extends Table
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

        $this->setTable('national_festivals');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->date('effected_date')
            ->requirePresence('effected_date', 'create')
            ->notEmpty('effected_date');

       /*  $validator
            ->scalar('statas')
            ->maxLength('statas', 255)
            ->requirePresence('statas', 'create')
            ->notEmpty('statas');
 */
        $validator
            ->scalar('changed_fixed')
            ->maxLength('changed_fixed', 255)
            ->requirePresence('changed_fixed', 'create')
            ->notEmpty('changed_fixed');

        return $validator;
    }
}
