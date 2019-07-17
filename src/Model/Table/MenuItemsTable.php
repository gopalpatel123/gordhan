<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MenuItems Model
 *
 * @property \App\Model\Table\MenuSubCategoriesTable|\Cake\ORM\Association\BelongsTo $MenuSubCategories
 *
 * @method \App\Model\Entity\MenuItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\MenuItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MenuItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MenuItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MenuItem|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MenuItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MenuItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MenuItem findOrCreate($search, callable $callback = null, $options = [])
 */
class MenuItemsTable extends Table
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

        $this->setTable('menu_items');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('MenuSubCategories', [
            'foreignKey' => 'menu_sub_category_id',
            'joinType' => 'INNER'
        ]); 
		$this->belongsTo('MenuCategories', [
            'foreignKey' => 'menu_category_id',
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

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        /* $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->requirePresence('status', 'create')
            ->notEmpty('status');
 */
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
        $rules->add($rules->existsIn(['menu_sub_category_id'], 'MenuSubCategories'));

        return $rules;
    }
}
