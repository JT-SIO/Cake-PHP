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
            <?= $this->Html->link(__('Liste des Forfait'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="forfait form content">
            <?= $this->Form->create($forfait) ?>
            <fieldset>
                <legend><?= __('Add Forfait') ?></legend>
                <?php
                    echo $this->Form->control('temps');
                    echo $this->Form->control('prix');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Envoie')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
