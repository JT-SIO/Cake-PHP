<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inscription $inscription
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Editer Inscription'), ['action' => 'edit', $inscription->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Suprimer Inscription'), ['action' => 'delete', $inscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inscription->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Liste des Inscriptions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nouvelle Inscription'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="inscriptions view content">
            <h3><span>Votre Inscription</span></h3>
            <table>
                <tr>
                    <th><?= __('Forfait') ?></th>
                    <td><?= $inscription->hasValue('forfait') ? $this->Html->link($inscription->forfait->prix, ['controller' => 'Forfait', 'action' => 'view', $inscription->forfait->id]). ' €' : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Machine') ?></th>
                    <td><?= $inscription->hasValue('machine') ? $this->Html->link($inscription->machine->nom, ['controller' => 'Machine', 'action' => 'view', $inscription->machine->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $inscription->hasValue('user') ? $this->Html->link($inscription->user->username, ['controller' => 'Users', 'action' => 'view', $inscription->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($inscription->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('DateDebut') ?></th>
                    <td><?= h($inscription->dateDebut) ?></td>
                </tr>
                <tr>
                    <th><?= __('DateFin') ?></th>
                    <td><?= h($inscription->dateFin) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>