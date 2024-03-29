<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PendingKotRow $pendingKotRow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pendingKotRow->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pendingKotRow->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pending Kot Rows'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pending Kots'), ['controller' => 'PendingKots', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pending Kot'), ['controller' => 'PendingKots', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pendingKotRows form large-9 medium-8 columns content">
    <?= $this->Form->create($pendingKotRow) ?>
    <fieldset>
        <legend><?= __('Edit Pending Kot Row') ?></legend>
        <?php
            echo $this->Form->control('pending_kot_id', ['options' => $pendingKots]);
            echo $this->Form->control('item_id', ['options' => $items]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('rate');
            echo $this->Form->control('amount');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
