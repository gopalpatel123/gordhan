<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenuSubCategory $menuSubCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $menuSubCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $menuSubCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Menu Sub Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Menu Categories'), ['controller' => 'MenuCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu Category'), ['controller' => 'MenuCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Menu Items'), ['controller' => 'MenuItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu Item'), ['controller' => 'MenuItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="menuSubCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($menuSubCategory) ?>
    <fieldset>
        <legend><?= __('Edit Menu Sub Category') ?></legend>
        <?php
            echo $this->Form->control('menu_category_id', ['options' => $menuCategories]);
            echo $this->Form->control('name');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
