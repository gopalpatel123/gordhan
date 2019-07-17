<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenuCategory $menuCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $menuCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $menuCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Menu Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Menu Sub Categories'), ['controller' => 'MenuSubCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu Sub Category'), ['controller' => 'MenuSubCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="menuCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($menuCategory) ?>
    <fieldset>
        <legend><?= __('Edit Menu Category') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
