<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DailyUsages Model
 *
 * @property \App\Model\Table\DailyUsageRowsTable|\Cake\ORM\Association\HasMany $DailyUsageRows
 *
 * @method \App\Model\Entity\DailyUsage get($primaryKey, $options = [])
 * @method \App\Model\Entity\DailyUsage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DailyUsage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DailyUsage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DailyUsage|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DailyUsage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DailyUsage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DailyUsage findOrCreate($search, callable $callback = null, $options = [])
 */
class DailyUsagesTable extends Table
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

        $this->setTable('daily_usages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('DailyUsageRows', [
            'foreignKey' => 'daily_usage_id'
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
            ->integer('voucher_no')
            ->requirePresence('voucher_no', 'create')
            ->notEmpty('voucher_no');

        $validator
            ->date('transaction_date')
            ->requirePresence('transaction_date', 'create')
            ->notEmpty('transaction_date');

        return $validator;
    }
}
