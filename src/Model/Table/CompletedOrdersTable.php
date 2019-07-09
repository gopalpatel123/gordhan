<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CompletedOrders Model
 *
 * @method \App\Model\Entity\CompletedOrder get($primaryKey, $options = [])
 * @method \App\Model\Entity\CompletedOrder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CompletedOrder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CompletedOrder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompletedOrder|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompletedOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CompletedOrder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CompletedOrder findOrCreate($search, callable $callback = null, $options = [])
 */
class CompletedOrdersTable extends Table
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

        $this->setTable('completed_orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Kots');
        $this->belongsTo('Bills');
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

        

        return $validator;
    }
}
