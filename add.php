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
            <?= $this->Html->link(__('Liste des Machine'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="machine form content">
            <?= $this->Form->create($machine) ?>
            <fieldset>
                <legend><?= __('Ajouter une Machine') ?></legend>
                <?php
                    echo $this->Form->control('nom');
                    echo $this->Form->control('Etat');
                    echo $this->Form->control('memoire');
                    echo $this->Form->control('OS');
                    echo $this->Form->control('processeur');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Envoie')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
