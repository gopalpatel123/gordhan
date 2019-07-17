<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenuItem $menuItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Menu Item'), ['action' => 'edit', $menuItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Menu Item'), ['action' => 'delete', $menuItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Menu Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menu Sub Categories'), ['controller' => 'MenuSubCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Sub Category'), ['controller' => 'MenuSubCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="menuItems view large-9 medium-8 columns content">
    <h3><?= h($menuItem->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Menu Sub Category') ?></th>
            <td><?= $menuItem->has('menu_sub_category') ? $this->Html->link($menuItem->menu_sub_category->name, ['controller' => 'MenuSubCategories', 'action' => 'view', $menuItem->menu_sub_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($menuItem->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($menuItem->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($menuItem->id) ?></td>
        </tr>
    </table>
</div>
