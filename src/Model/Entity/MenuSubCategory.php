<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MenuSubCategory Entity
 *
 * @property int $id
 * @property int $menu_category_id
 * @property string $name
 * @property string $status
 *
 * @property \App\Model\Entity\MenuCategory $menu_category
 * @property \App\Model\Entity\MenuItem[] $menu_items
 */
class MenuSubCategory extends Entity
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
        'menu_category_id' => true,
        'name' => true,
        'status' => true,
        'menu_category' => true,
        'menu_items' => true
    ];
}
