<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PendingKot $pendingKot
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pendingKot->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pendingKot->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pending Kots'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pending Kot Rows'), ['controller' => 'PendingKotRows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pending Kot Row'), ['controller' => 'PendingKotRows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pendingKots form large-9 medium-8 columns content">
    <?= $this->Form->create($pendingKot) ?>
    <fieldset>
        <legend><?= __('Edit Pending Kot') ?></legend>
        <?php
            echo $this->Form->control('financial_year_id');
            echo $this->Form->control('employee_id', ['options' => $employees, 'empty' => true]);
            echo $this->Form->control('table_id', ['options' => $tables]);
            echo $this->Form->control('table_no');
            echo $this->Form->control('no_of_pax');
            echo $this->Form->control('no_of_adult');
            echo $this->Form->control('no_of_child');
            echo $this->Form->control('kot_pending');
            echo $this->Form->control('comment');
            echo $this->Form->control('order_type');
            echo $this->Form->control('created_on');
            echo $this->Form->control('cancle');
            echo $this->Form->control('cancle_time');
            echo $this->Form->control('cancle_reason');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
