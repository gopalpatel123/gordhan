<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NationalFestival[]|\Cake\Collection\CollectionInterface $nationalFestivals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New National Festival'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nationalFestivals index large-9 medium-8 columns content">
    <h3><?= __('National Festivals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('effected_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('changed_fixed') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nationalFestivals as $nationalFestival): ?>
            <tr>
                <td><?= $this->Number->format($nationalFestival->id) ?></td>
                <td><?= h($nationalFestival->name) ?></td>
                <td><?= h($nationalFestival->effected_date) ?></td>
                <td><?= h($nationalFestival->statas) ?></td>
                <td><?= h($nationalFestival->changed_fixed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nationalFestival->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nationalFestival->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nationalFestival->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nationalFestival->id)]) ?>
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
