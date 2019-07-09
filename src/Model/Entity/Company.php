<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $id
 * @property string $name
 * @property int $gst_no
 * @property int $email
 * @property int $mobile_no
 * @property int $website
 * @property int $brand_name
 * @property int $logo
 */
class Company extends Entity
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
        'gst_no' => true,
        'email' => true,
        'mobile_no' => true,
        'website' => true,
        'brand_name' => true,
        'logo' => true
    ];
}
