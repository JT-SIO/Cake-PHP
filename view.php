<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Forfait $forfait
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Modifier Forfait'), ['action' => 'edit', $forfait->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Suprimer Forfait'), ['action' => 'delete', $forfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forfait->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Liste des Forfait'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nouveaux Forfait'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="forfait view content">
            <h3><?= h($forfait->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($forfait->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prix') ?></th>
                    <td><?= $forfait->prix === null ? '' : $this->Number->format($forfait->prix) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Inscriptions') ?></h4>
                <?php if (!empty($forfait->inscriptions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('DateDebut') ?></th>
                            <th><?= __('DateFin') ?></th>
                            <th><?= __('Forfait Id') ?></th>
                            <th><?= __('Machine Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($forfait->inscriptions as $inscription) : ?>
                        <tr>
                            <td><?= h($inscription->id) ?></td>
                            <td><?= h($inscription->dateDebut) ?></td>
                            <td><?= h($inscription->dateFin) ?></td>
                            <td><?= h($inscription->forfait_id) ?></td>
                            <td><?= h($inscription->machine_id) ?></td>
                            <td><?= h($inscription->user_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Inscriptions', 'action' => 'view', $inscription->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Inscriptions', 'action' => 'edit', $inscription->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Inscriptions', 'action' => 'delete', $inscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inscription->id)]) ?>
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