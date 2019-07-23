<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PendingKots Model
 *
 * @property \App\Model\Table\FinancialYearsTable|\Cake\ORM\Association\BelongsTo $FinancialYears
 * @property \App\Model\Table\EmployeesTable|\Cake\ORM\Association\BelongsTo $Employees
 * @property \App\Model\Table\TablesTable|\Cake\ORM\Association\BelongsTo $Tables
 * @property \App\Model\Table\PendingKotRowsTable|\Cake\ORM\Association\HasMany $PendingKotRows
 *
 * @method \App\Model\Entity\PendingKot get($primaryKey, $options = [])
 * @method \App\Model\Entity\PendingKot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PendingKot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PendingKot|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PendingKot|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PendingKot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PendingKot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PendingKot findOrCreate($search, callable $callback = null, $options = [])
 */
class PendingKotsTable extends Table
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

        $this->setTable('pending_kots');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('FinancialYears', [
            'foreignKey' => 'financial_year_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Kots');
        $this->belongsTo('TableRows');
        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id'
        ]);
        $this->belongsTo('Tables', [
            'foreignKey' => 'table_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('PendingKotRows', [
            'foreignKey' => 'pending_kot_id'
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
            ->integer('table_no')
            ->requirePresence('table_no', 'create')
            ->notEmpty('table_no');

        $validator
            ->integer('no_of_pax')
            ->requirePresence('no_of_pax', 'create')
            ->notEmpty('no_of_pax');

        $validator
            ->integer('no_of_adult')
            ->requirePresence('no_of_adult', 'create')
            ->notEmpty('no_of_adult');

        $validator
            ->integer('no_of_child')
            ->requirePresence('no_of_child', 'create')
            ->notEmpty('no_of_child');

        $validator
            ->scalar('kot_pending')
            ->maxLength('kot_pending', 10)
            ->requirePresence('kot_pending', 'create')
            ->notEmpty('kot_pending');

        $validator
            ->scalar('comment')
            ->requirePresence('comment', 'create')
            ->notEmpty('comment');

        $validator
            ->scalar('order_type')
            ->maxLength('order_type', 20)
            ->requirePresence('order_type', 'create')
            ->notEmpty('order_type');

        $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on');

        $validator
            ->scalar('cancle')
            ->maxLength('cancle', 11)
            ->requirePresence('cancle', 'create')
            ->notEmpty('cancle');

        $validator
            ->dateTime('cancle_time')
            ->allowEmpty('cancle_time');

        $validator
            ->scalar('cancle_reason')
            ->maxLength('cancle_reason', 255)
            ->requirePresence('cancle_reason', 'create')
            ->notEmpty('cancle_reason');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['financial_year_id'], 'FinancialYears'));
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));
        $rules->add($rules->existsIn(['table_id'], 'Tables'));

        return $rules;
    }
}
