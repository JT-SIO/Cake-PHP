<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Forfait> $forfait
 */
?>
<div class="forfait index content">
    <?= $this->Html->link(__('New Forfait'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Forfait') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('temps') ?></th>
                    <th><?= $this->Paginator->sort('prix') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($forfait as $forfait): ?>
                <tr>
                    <td><?= $this->Number->format($forfait->id) ?></td>
                    <td><?= h($forfait->temps) ?></td>
                    <td><?= $forfait->prix === null ? '' : $this->Number->format($forfait->prix). ' €' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $forfait->id]) ?>
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $forfait->id]) ?>
                        <?= $this->Form->postLink(__('Suprimer'), ['action' => 'delete', $forfait->id], ['confirm' => __('Etes vous sûr ?', $forfait->id)]) ?>
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