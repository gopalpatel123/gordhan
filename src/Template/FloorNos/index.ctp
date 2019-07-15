<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FloorNo[]|\Cake\Collection\CollectionInterface $floorNos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Floor No'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="floorNos index large-9 medium-8 columns content">
    <h3><?= __('Floor Nos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($floorNos as $floorNo): ?>
            <tr>
                <td><?= $this->Number->format($floorNo->id) ?></td>
                <td><?= h($floorNo->name) ?></td>
                <td><?= h($floorNo->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $floorNo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $floorNo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $floorNo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $floorNo->id)]) ?>
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
