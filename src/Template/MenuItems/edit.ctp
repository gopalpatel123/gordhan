<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenuItem $menuItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $menuItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $menuItem->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Menu Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Menu Sub Categories'), ['controller' => 'MenuSubCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu Sub Category'), ['controller' => 'MenuSubCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="menuItems form large-9 medium-8 columns content">
    <?= $this->Form->create($menuItem) ?>
    <fieldset>
        <legend><?= __('Edit Menu Item') ?></legend>
        <?php
            echo $this->Form->control('menu_sub_category_id', ['options' => $menuSubCategories]);
            echo $this->Form->control('name');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
