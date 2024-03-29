<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DailyUsage Entity
 *
 * @property int $id
 * @property int $voucher_no
 * @property \Cake\I18n\FrozenDate $transaction_date
 *
 * @property \App\Model\Entity\DailyUsageRow[] $daily_usage_rows
 */
class DailyUsage extends Entity
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
        'transaction_date' => true,
        'daily_usage_rows' => true
    ];
}
