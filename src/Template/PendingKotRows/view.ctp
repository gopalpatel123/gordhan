<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PendingKotRow $pendingKotRow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pending Kot Row'), ['action' => 'edit', $pendingKotRow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pending Kot Row'), ['action' => 'delete', $pendingKotRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pendingKotRow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pending Kot Rows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pending Kot Row'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pending Kots'), ['controller' => 'PendingKots', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pending Kot'), ['controller' => 'PendingKots', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pendingKotRows view large-9 medium-8 columns content">
    <h3><?= h($pendingKotRow->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pending Kot') ?></th>
            <td><?= $pendingKotRow->has('pending_kot') ? $this->Html->link($pendingKotRow->pending_kot->id, ['controller' => 'PendingKots', 'action' => 'view', $pendingKotRow->pending_kot->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $pendingKotRow->has('item') ? $this->Html->link($pendingKotRow->item->name, ['controller' => 'Items', 'action' => 'view', $pendingKotRow->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pendingKotRow->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($pendingKotRow->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rate') ?></th>
            <td><?= $this->Number->format($pendingKotRow->rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($pendingKotRow->amount) ?></td>
        </tr>
    </table>
</div>
