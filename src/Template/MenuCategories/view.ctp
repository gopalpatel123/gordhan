<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenuCategory $menuCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Menu Category'), ['action' => 'edit', $menuCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Menu Category'), ['action' => 'delete', $menuCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Menu Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menu Sub Categories'), ['controller' => 'MenuSubCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Sub Category'), ['controller' => 'MenuSubCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="menuCategories view large-9 medium-8 columns content">
    <h3><?= h($menuCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($menuCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($menuCategory->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($menuCategory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Menu Sub Categories') ?></h4>
        <?php if (!empty($menuCategory->menu_sub_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Menu Category Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($menuCategory->menu_sub_categories as $menuSubCategories): ?>
            <tr>
                <td><?= h($menuSubCategories->id) ?></td>
                <td><?= h($menuSubCategories->menu_category_id) ?></td>
                <td><?= h($menuSubCategories->name) ?></td>
                <td><?= h($menuSubCategories->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MenuSubCategories', 'action' => 'view', $menuSubCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MenuSubCategories', 'action' => 'edit', $menuSubCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MenuSubCategories', 'action' => 'delete', $menuSubCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuSubCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
