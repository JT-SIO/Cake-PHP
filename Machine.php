<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Machine Entity
 *
 * @property int $id
 * @property string|null $nom
 * @property string|null $Etat
 * @property string|null $memoire
 * @property string|null $OS
 * @property string|null $processeur
 *
 * @property \App\Model\Entity\Association $association
 * @property \App\Model\Entity\Inscription[] $inscriptions
 */
class Machine extends Entity
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
        'nom' => true,
        'Etat' => true,
        'memoire' => true,
        'OS' => true,
        'processeur' => true,
        'association' => true,
        'inscriptions' => true,
    ];
}
