<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenuItem[]|\Cake\Collection\CollectionInterface $menuItems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Menu Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Menu Sub Categories'), ['controller' => 'MenuSubCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu Sub Category'), ['controller' => 'MenuSubCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="menuItems index large-9 medium-8 columns content">
    <h3><?= __('Menu Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('menu_sub_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menuItems as $menuItem): ?>
            <tr>
                <td><?= $this->Number->format($menuItem->id) ?></td>
                <td><?= $menuItem->has('menu_sub_category') ? $this->Html->link($menuItem->menu_sub_category->name, ['controller' => 'MenuSubCategories', 'action' => 'view', $menuItem->menu_sub_category->id]) : '' ?></td>
                <td><?= h($menuItem->name) ?></td>
                <td><?= h($menuItem->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $menuItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menuItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menuItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuItem->id)]) ?>
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
