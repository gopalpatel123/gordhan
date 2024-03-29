<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tables Model
 *
 * @method \App\Model\Entity\Table get($primaryKey, $options = [])
 * @method \App\Model\Entity\Table newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Table[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Table|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Table|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Table patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Table[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Table findOrCreate($search, callable $callback = null, $options = [])
 */
class TablesTable extends Table
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

        $this->setTable('tables');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('FloorNos', [
            'foreignKey' => 'floor_no_id',
            'joinType' => 'LEFT'
        ]);
       // $this->belongsTo('PendingKots');
        $this->belongsTo('Items');
        $this->belongsTo('Kots');
        $this->belongsTo('Bills');
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'LEFT'
        ]);
		 $this->hasMany('TableRows', [
            'foreignKey' => 'table_id',
            'joinType' => 'LEFT'
        ]);
		$this->hasMany('PendingKots', [
            'foreignKey' => 'table_id',
            'joinType' => 'LEFT'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
