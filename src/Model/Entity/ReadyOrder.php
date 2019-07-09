<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ReadyOrder Entity
 *
 * @property int $id
 * @property int $table_no
 * @property \Cake\I18n\FrozenTime $created_date
 */
class ReadyOrder extends Entity
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
        'table_no' => true,
        'created_date' => true
    ];
}
