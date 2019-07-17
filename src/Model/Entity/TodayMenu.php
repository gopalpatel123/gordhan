<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TodayMenu Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $created_date
 * @property string $menu_type
 *
 * @property \App\Model\Entity\TodayMenuRow[] $today_menu_rows
 */
class TodayMenu extends Entity
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
        'created_date' => true,
        'menu_type' => true,
        'today_menu_rows' => true
    ];
}
