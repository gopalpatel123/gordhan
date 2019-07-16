<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TableRow[]|\Cake\Collection\CollectionInterface $tableRows
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Table Row'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tableRows index large-9 medium-8 columns content">
    <h3><?= __('Table Rows') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('table_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('booking_time') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tableRows as $tableRow): ?>
            <tr>
                <td><?= $this->Number->format($tableRow->id) ?></td>
                <td><?= $tableRow->has('table') ? $this->Html->link($tableRow->table->name, ['controller' => 'Tables', 'action' => 'view', $tableRow->table->id]) : '' ?></td>
                <td><?= h($tableRow->name) ?></td>
                <td><?= h($tableRow->status) ?></td>
                <td><?= h($tableRow->booking_time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tableRow->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tableRow->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tableRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tableRow->id)]) ?>
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
