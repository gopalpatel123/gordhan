<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Kot Entity
 *
 * @property int $id
 * @property int $voucher_no
 * @property int $table_id
 * @property \Cake\I18n\FrozenTime $created_on
 *
 * @property \App\Model\Entity\Table $table
 * @property \App\Model\Entity\KotRow[] $kot_rows
 */
class Kot extends Entity
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
        'voucher_no' => true,
        'table_id' => true,
        'created_on' => true,
        'table' => true,
        'payment_pending' => true,
        'pending_kot_id' => true,
        'kot_rows' => true
    ];
}
