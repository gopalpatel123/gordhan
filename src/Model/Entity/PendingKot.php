<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PendingKot Entity
 *
 * @property int $id
 * @property int $financial_year_id
 * @property int $employee_id
 * @property int $table_id
 * @property int $table_no
 * @property int $no_of_pax
 * @property int $no_of_adult
 * @property int $no_of_child
 * @property string $kot_pending
 * @property string $comment
 * @property string $order_type
 * @property \Cake\I18n\FrozenTime $created_on
 * @property string $cancle
 * @property \Cake\I18n\FrozenTime $cancle_time
 * @property string $cancle_reason
 *
 * @property \App\Model\Entity\Table $table
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\FinancialYear $financial_year
 * @property \App\Model\Entity\PendingKotRow[] $pending_kot_rows
 */
class PendingKot extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'financial_year_id' => true,
        'employee_id' => true,
        'table_id' => true,
        'table_no' => true,
        'no_of_pax' => true,
        'no_of_adult' => true,
        'no_of_child' => true,
        'kot_pending' => true,
        'comment' => true,
        'order_type' => true,
        'created_on' => true,
        'cancle' => true,
        'cancle_time' => true,
        'cancle_reason' => true,
        'table' => true,
        'employee' => true,
        'financial_year' => true,
        'pending_kot_rows' => true
    ];
}
