<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PendingKotRow[]|\Cake\Collection\CollectionInterface $pendingKotRows
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pending Kot Row'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pending Kots'), ['controller' => 'PendingKots', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pending Kot'), ['controller' => 'PendingKots', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pendingKotRows index large-9 medium-8 columns content">
    <h3><?= __('Pending Kot Rows') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pending_kot_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pendingKotRows as $pendingKotRow): ?>
            <tr>
                <td><?= $this->Number->format($pendingKotRow->id) ?></td>
                <td><?= $pendingKotRow->has('pending_kot') ? $this->Html->link($pendingKotRow->pending_kot->id, ['controller' => 'PendingKots', 'action' => 'view', $pendingKotRow->pending_kot->id]) : '' ?></td>
                <td><?= $pendingKotRow->has('item') ? $this->Html->link($pendingKotRow->item->name, ['controller' => 'Items', 'action' => 'view', $pendingKotRow->item->id]) : '' ?></td>
                <td><?= $this->Number->format($pendingKotRow->quantity) ?></td>
                <td><?= $this->Number->format($pendingKotRow->rate) ?></td>
                <td><?= $this->Number->format($pendingKotRow->amount) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pendingKotRow->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pendingKotRow->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pendingKotRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pendingKotRow->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
