<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Machine> $machine
 */
?>
<div class="machine index content">
    <?= $this->Html->link(__('Nouvelle Machine'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Machine') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nom') ?></th>
                    <th><?= $this->Paginator->sort('Etat') ?></th>
                    <th><?= $this->Paginator->sort('memoire') ?></th>
                    <th><?= $this->Paginator->sort('OS') ?></th>
                    <th><?= $this->Paginator->sort('processeur') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($machine as $machine): ?>
                <tr>
                    <td><?= $this->Number->format($machine->id) ?></td>
                    <td><?= h($machine->nom) ?></td>
                    <td><?= h($machine->Etat) ?></td>
                    <td><?= h($machine->memoire) ?></td>
                    <td><?= h($machine->OS) ?></td>
                    <td><?= h($machine->processeur) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $machine->id]) ?>
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $machine->id]) ?>
                        <?= $this->Form->postLink(__('Suprimer'), ['action' => 'delete', $machine->id], ['confirm' => __('Etes vous sûr ?', $machine->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('début')) ?>
            <?= $this->Paginator->prev('< ' . __('précedant')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
            <?= $this->Paginator->last(__('fin') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}')) ?></p>
    </div>
</div>