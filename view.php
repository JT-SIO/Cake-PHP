<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machine $machine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Editer Machine'), ['action' => 'edit', $machine->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Suprimer Machine'), ['action' => 'delete', $machine->id], ['confirm' => __('Etes vous sûr ?', $machine->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Liste des Machine'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nouvelle Machine'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="machine view content">
            <h3><?= h($machine->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nom') ?></th>
                    <td><?= h($machine->nom) ?></td>
                </tr>
                <tr>
                    <th><?= __('Etat') ?></th>
                    <td><?= h($machine->Etat) ?></td>
                </tr>
                <tr>
                    <th><?= __('Memoire') ?></th>
                    <td><?= h($machine->memoire) ?></td>
                </tr>
                <tr>
                    <th><?= __('OS') ?></th>
                    <td><?= h($machine->OS) ?></td>
                </tr>
                <tr>
                    <th><?= __('Processeur') ?></th>
                    <td><?= h($machine->processeur) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($machine->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Inscriptions') ?></h4>
                <?php if (!empty($machine->inscriptions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Forfait') ?></th>
                            <th><?= __('Machine') ?></th>
                            <th><?= __('Utilisateur') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($machine->inscriptions as $inscription) : ?>
                        <tr>
                            <td><?= h($inscription->id) ?></td>
                            <td><?= h($inscription->date) ?></td>
                            <td><?= h($inscription->forfait_id) ?></td>
                            <td><?= h($inscription->machine_id) ?></td>
                            <td><?= h($inscription->user_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Voir'), ['controller' => 'Inscriptions', 'action' => 'view', $inscription->id]) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Inscriptions', 'action' => 'edit', $inscription->id]) ?>
                                <?= $this->Form->postLink(__('Suprimer'), ['controller' => 'Inscriptions', 'action' => 'delete', $inscription->id], ['confirm' => __('Etes vous sûr ?', $inscription->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>