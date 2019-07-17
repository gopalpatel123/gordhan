<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TodayMenuRows Model
 *
 * @property \App\Model\Table\TodayMenusTable|\Cake\ORM\Association\BelongsTo $TodayMenus
 * @property \App\Model\Table\MenuItemsTable|\Cake\ORM\Association\BelongsTo $MenuItems
 *
 * @method \App\Model\Entity\TodayMenuRow get($primaryKey, $options = [])
 * @method \App\Model\Entity\TodayMenuRow newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TodayMenuRow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TodayMenuRow|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TodayMenuRow|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TodayMenuRow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TodayMenuRow[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TodayMenuRow findOrCreate($search, callable $callback = null, $options = [])
 */
class TodayMenuRowsTable extends Table
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

        $this->setTable('today_menu_rows');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TodayMenus', [
            'foreignKey' => 'today_menu_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MenuItems', [
            'foreignKey' => 'menu_item_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['today_menu_id'], 'TodayMenus'));
        $rules->add($rules->existsIn(['menu_item_id'], 'MenuItems'));

        return $rules;
    }
}
