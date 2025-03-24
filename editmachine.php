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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $machine->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $machine->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Machine'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="machine form content">
            <?= $this->Form->create($machine) ?>
            <fieldset>
                <legend><?= __('Edit Machine') ?></legend>
                <?php
                    echo $this->Form->control('nom');
                    echo $this->Form->control('Etat');
                    echo $this->Form->control('memoire');
                    echo $this->Form->control('OS');
                    echo $this->Form->control('processeur');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
