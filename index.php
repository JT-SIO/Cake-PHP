<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Machine> $machine
 */
?>
<div class="machine index content">
    <?= $this->Html->link(__("S'inscrire"), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Inscription') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Nom') ?></th>
                    <th><?= $this->Paginator->sort('Machine') ?></th>
                    <th><?= $this->Paginator->sort('Prix') ?></th>
                    <th><?= $this->Paginator->sort('Date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inscriptions as $inscription): ?>
                <tr>
                    <td><?= h($inscription->user->username) ?></td>
                    <td><?= h($inscription->machine->nom) ?></td>
                    <td><?= h($inscription->forfait->prix) ?></td>
                    <td><?= h($inscription->date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $inscription->id]) ?>
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $inscription->id]) ?>
                        <?= $this->Form->postLink(__('Suprimer'), ['action' => 'delete', $inscription->id], ['confirm' => __('Etes vous sûr ? # {0}?', $inscription->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('début')) ?>
            <?= $this->Paginator->prev('< ' . __('précédant')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
            <?= $this->Paginator->last(__('fin') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}')) ?></p>
    </div>
</div>