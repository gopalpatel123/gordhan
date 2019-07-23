<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PendingKot[]|\Cake\Collection\CollectionInterface $pendingKots
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pending Kot'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pending Kot Rows'), ['controller' => 'PendingKotRows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pending Kot Row'), ['controller' => 'PendingKotRows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pendingKots index large-9 medium-8 columns content">
    <h3><?= __('Pending Kots') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('financial_year_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('table_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('table_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_of_pax') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_of_adult') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_of_child') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kot_pending') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cancle') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cancle_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cancle_reason') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pendingKots as $pendingKot): ?>
            <tr>
                <td><?= $this->Number->format($pendingKot->id) ?></td>
                <td><?= $this->Number->format($pendingKot->financial_year_id) ?></td>
                <td><?= $pendingKot->has('employee') ? $this->Html->link($pendingKot->employee->name, ['controller' => 'Employees', 'action' => 'view', $pendingKot->employee->id]) : '' ?></td>
                <td><?= $pendingKot->has('table') ? $this->Html->link($pendingKot->table->name, ['controller' => 'Tables', 'action' => 'view', $pendingKot->table->id]) : '' ?></td>
                <td><?= $this->Number->format($pendingKot->table_no) ?></td>
                <td><?= $this->Number->format($pendingKot->no_of_pax) ?></td>
                <td><?= $this->Number->format($pendingKot->no_of_adult) ?></td>
                <td><?= $this->Number->format($pendingKot->no_of_child) ?></td>
                <td><?= h($pendingKot->kot_pending) ?></td>
                <td><?= h($pendingKot->order_type) ?></td>
                <td><?= h($pendingKot->created_on) ?></td>
                <td><?= h($pendingKot->cancle) ?></td>
                <td><?= h($pendingKot->cancle_time) ?></td>
                <td><?= h($pendingKot->cancle_reason) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pendingKot->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pendingKot->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pendingKot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pendingKot->id)]) ?>
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
