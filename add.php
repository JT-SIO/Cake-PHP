<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inscription $inscription
 * @var \Cake\Collection\CollectionInterface|string[] $forfait
 * @var \Cake\Collection\CollectionInterface|string[] $machine
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Liste des Inscriptions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="inscriptions form content">
            <?= $this->Form->create($inscription) ?>
            <fieldset>
                <legend><?= __('Add Inscription') ?></legend>
                <?php
                    echo $this->Form->control('date');
                    echo $this->Form->control('forfait_id', ['options' => $forfait]);
                    echo $this->Form->control('machine_id', ['options' => $machine]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
