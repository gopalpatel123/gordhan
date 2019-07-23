<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TableRow Entity
 *
 * @property int $id
 * @property int $table_id
 * @property string $name
 * @property string $status
 * @property \Cake\I18n\FrozenDate $booking_time
 *
 * @property \App\Model\Entity\Table $table
 */
class TableRow extends Entity
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
        'table_id' => true,
        'name' => true,
        'status' => true,
        'booking_time' => true,
        'pending_kot_id' => true,
        'table' => true
    ];
}
