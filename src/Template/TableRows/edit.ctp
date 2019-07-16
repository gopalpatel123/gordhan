<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TableRow $tableRow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tableRow->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tableRow->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Table Rows'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tableRows form large-9 medium-8 columns content">
    <?= $this->Form->create($tableRow) ?>
    <fieldset>
        <legend><?= __('Edit Table Row') ?></legend>
        <?php
            echo $this->Form->control('table_id', ['options' => $tables]);
            echo $this->Form->control('name');
            echo $this->Form->control('status');
            echo $this->Form->control('booking_time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
