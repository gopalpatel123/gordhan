<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TableRow $tableRow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Table Row'), ['action' => 'edit', $tableRow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Table Row'), ['action' => 'delete', $tableRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tableRow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Table Rows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Table Row'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tableRows view large-9 medium-8 columns content">
    <h3><?= h($tableRow->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Table') ?></th>
            <td><?= $tableRow->has('table') ? $this->Html->link($tableRow->table->name, ['controller' => 'Tables', 'action' => 'view', $tableRow->table->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($tableRow->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($tableRow->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tableRow->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Booking Time') ?></th>
            <td><?= h($tableRow->booking_time) ?></td>
        </tr>
    </table>
</div>
