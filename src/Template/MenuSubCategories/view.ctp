<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenuSubCategory $menuSubCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Menu Sub Category'), ['action' => 'edit', $menuSubCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Menu Sub Category'), ['action' => 'delete', $menuSubCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuSubCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Menu Sub Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Sub Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menu Categories'), ['controller' => 'MenuCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Category'), ['controller' => 'MenuCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menu Items'), ['controller' => 'MenuItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Item'), ['controller' => 'MenuItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="menuSubCategories view large-9 medium-8 columns content">
    <h3><?= h($menuSubCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Menu Category') ?></th>
            <td><?= $menuSubCategory->has('menu_category') ? $this->Html->link($menuSubCategory->menu_category->name, ['controller' => 'MenuCategories', 'action' => 'view', $menuSubCategory->menu_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($menuSubCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($menuSubCategory->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($menuSubCategory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Menu Items') ?></h4>
        <?php if (!empty($menuSubCategory->menu_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Menu Sub Category Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($menuSubCategory->menu_items as $menuItems): ?>
            <tr>
                <td><?= h($menuItems->id) ?></td>
                <td><?= h($menuItems->menu_sub_category_id) ?></td>
                <td><?= h($menuItems->name) ?></td>
                <td><?= h($menuItems->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MenuItems', 'action' => 'view', $menuItems->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MenuItems', 'action' => 'edit', $menuItems->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MenuItems', 'action' => 'delete', $menuItems->], ['confirm' => __('Are you sure you want to delete # {0}?', $menuItems->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
