<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReadyOrders Model
 *
 * @method \App\Model\Entity\ReadyOrder get($primaryKey, $options = [])
 * @method \App\Model\Entity\ReadyOrder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ReadyOrder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ReadyOrder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReadyOrder|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReadyOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ReadyOrder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ReadyOrder findOrCreate($search, callable $callback = null, $options = [])
 */
class ReadyOrdersTable extends Table
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

        $this->setTable('ready_orders');
        $this->setDisplayField('id');
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
            ->integer('table_no')
            ->requirePresence('table_no', 'create')
            ->notEmpty('table_no');

        $validator
            ->dateTime('created_date')
            ->requirePresence('created_date', 'create')
            ->notEmpty('created_date');

        return $validator;
    }
}
