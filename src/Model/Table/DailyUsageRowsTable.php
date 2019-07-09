<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DailyUsageRows Model
 *
 * @property \App\Model\Table\DailyUsagesTable|\Cake\ORM\Association\BelongsTo $DailyUsages
 * @property \App\Model\Table\RawMaterialsTable|\Cake\ORM\Association\BelongsTo $RawMaterials
 *
 * @method \App\Model\Entity\DailyUsageRow get($primaryKey, $options = [])
 * @method \App\Model\Entity\DailyUsageRow newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DailyUsageRow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DailyUsageRow|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DailyUsageRow|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DailyUsageRow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DailyUsageRow[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DailyUsageRow findOrCreate($search, callable $callback = null, $options = [])
 */
class DailyUsageRowsTable extends Table
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

        $this->setTable('daily_usage_rows');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('DailyUsages', [
            'foreignKey' => 'daily_usage_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RawMaterials', [
            'foreignKey' => 'raw_material_id',
            'joinType' => 'INNER'
        ]);
		$this->hasMany('StockLedgers', [
            'foreignKey' => 'daily_usage_row_id'
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
            ->decimal('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

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
        $rules->add($rules->existsIn(['daily_usage_id'], 'DailyUsages'));
        $rules->add($rules->existsIn(['raw_material_id'], 'RawMaterials'));

        return $rules;
    }
}
