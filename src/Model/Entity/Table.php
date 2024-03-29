<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Table Entity
 *
 * @property int $id
 * @property string $name
 */
class Table extends Entity
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
        'name' => true,
        'capacity' => true,
        'floor_no_id' => true
    ];
}
