<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TodayMenuRow Entity
 *
 * @property int $id
 * @property int $today_menu_id
 * @property int $menu_item_id
 *
 * @property \App\Model\Entity\TodayMenu $today_menu
 * @property \App\Model\Entity\MenuItem $menu_item
 */
class TodayMenuRow extends Entity
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
        'today_menu_id' => true,
        'menu_item_id' => true,
        'today_menu' => true,
        'menu_item' => true
    ];
}
