<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DailyUsageRow Entity
 *
 * @property int $id
 * @property int $daily_usage_id
 * @property int $raw_material_id
 * @property float $quantity
 *
 * @property \App\Model\Entity\DailyUsage $daily_usage
 * @property \App\Model\Entity\RawMaterial $raw_material
 */
class DailyUsageRow extends Entity
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
        'daily_usage_id' => true,
        'raw_material_id' => true,
        'quantity' => true,
        'daily_usage' => true,
        'raw_material' => true
    ];
}
