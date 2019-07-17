<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TodayMenus Model
 *
 * @property \App\Model\Table\TodayMenuRowsTable|\Cake\ORM\Association\HasMany $TodayMenuRows
 *
 * @method \App\Model\Entity\TodayMenu get($primaryKey, $options = [])
 * @method \App\Model\Entity\TodayMenu newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TodayMenu[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TodayMenu|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TodayMenu|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TodayMenu patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TodayMenu[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TodayMenu findOrCreate($search, callable $callback = null, $options = [])
 */
class TodayMenusTable extends Table
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

        $this->setTable('today_menus');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('TodayMenuRows', [
            'foreignKey' => 'today_menu_id'
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
            ->date('created_date')
            ->requirePresence('created_date', 'create')
            ->notEmpty('created_date');

        $validator
            ->scalar('menu_type')
            ->maxLength('menu_type', 255)
            ->requirePresence('menu_type', 'create')
            ->notEmpty('menu_type');

        return $validator;
    }
}
