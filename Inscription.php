<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inscription Entity
 *
 * @property int $id
 * @property \Cake\I18n\DateTime $dateDebut
 * @property \Cake\I18n\DateTime $dateFin
 * @property int $forfait_id
 * @property int $machine_id
 * @property string $user_id
 *
 * @property \App\Model\Entity\Forfait $forfait
 * @property \App\Model\Entity\Machine $machine
 * @property \CakeDC\Users\Model\Entity\User $user
 */
class Inscription extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'dateDebut' => true,
        'dateFin' => true,
        'forfait_id' => true,
        'machine_id' => true,
        'user_id' => true,
        'forfait' => true,
        'machine' => true,
        'user' => true,
    ];
}
