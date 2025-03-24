<?php
/**
 * Copyright 2010 - 2019, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2018, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$Users = ${$tableAlias};
?>
<div class="actions columns large-2 medium-3">
    <h3><?= __d('cake_d_c/users', 'Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__d('cake_d_c/users', 'Modifier'), ['action' => 'edit', $Users->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __d('cake_d_c/users', 'Suprimer'),
                ['action' => 'delete', $Users->id],
                ['confirm' => __d('cake_d_c/users', 'Etes vous sûr # {0}?', $Users->id)]
            ) ?> </li>
        <li><?= $this->Html->link(__d('cake_d_c/users', 'Liste des utilisateur'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('cake_d_c/users', 'Nouveaux utilisateur'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __d('cake_d_c/users', 'Pseudo') ?></h6>
            <p><?= h($Users->username) ?></p>
            <h6 class="subheader"><?= __d('cake_d_c/users', 'Email') ?></h6>
            <p><?= h($Users->email) ?></p>
            <h6 class="subheader"><?= __d('cake_d_c/users', 'Nom') ?></h6>
            <p><?= h($Users->first_name) ?></p>
            <h6 class="subheader"><?= __d('cake_d_c/users', 'Prénom') ?></h6>
            <p><?= h($Users->last_name) ?></p>
            <h6 class="subheader"><?= __d('cake_d_c/users', 'Rôle') ?></h6>
            <p><?= h($Users->role) ?></p>
            <h6 class="subheader"><?= __d('cake_d_c/users', 'Token') ?></h6>
            <p><?= h($Users->token) ?></p>
            <h6 class="subheader"><?= __d('cake_d_c/users', 'Api Token') ?></h6>
            <p><?= h($Users->api_token) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __d('cake_d_c/users', 'Active') ?></h6>
            <p><?= $this->Number->format($Users->active) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __d('cake_d_c/users', 'Token Expires') ?></h6>
            <p><?= h($Users->token_expires) ?></p>
            <h6 class="subheader"><?= __d('cake_d_c/users', "date d'activation") ?></h6>
            <p><?= h($Users->activation_date) ?></p>
            <h6 class="subheader"><?= __d('cake_d_c/users', 'Tos Date') ?></h6>
            <p><?= h($Users->tos_date) ?></p>
            <h6 class="subheader"><?= __d('cake_d_c/users', 'Créé le') ?></h6>
            <p><?= h($Users->created) ?></p>
            <h6 class="subheader"><?= __d('cake_d_c/users', 'Modifier le') ?></h6>
            <p><?= h($Users->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
        <h4 class="subheader"><?= __d('cake_d_c/users', 'Social Accounts') ?></h4>
        <?php if (!empty($Users->social_accounts)) : ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?= __d('cake_d_c/users', 'Provider') ?></th>
                    <th><?= __d('cake_d_c/users', 'Avatar') ?></th>
                    <th><?= __d('cake_d_c/users', 'Active') ?></th>
                    <th><?= __d('cake_d_c/users', 'Created') ?></th>
                    <th><?= __d('cake_d_c/users', 'Modified') ?></th>
                </tr>
                <?php foreach ($Users->social_accounts as $socialAccount) : ?>
                    <tr>
                        <td><?= h($socialAccount->provider) ?></td>
                        <td><?= h($socialAccount->avatar) ?></td>
                        <td><?= h($socialAccount->active) ?></td>
                        <td><?= h($socialAccount->created) ?></td>
                        <td><?= h($socialAccount->modified) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
