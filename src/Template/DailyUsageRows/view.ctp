<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DailyUsageRow $dailyUsageRow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Daily Usage Row'), ['action' => 'edit', $dailyUsageRow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Daily Usage Row'), ['action' => 'delete', $dailyUsageRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dailyUsageRow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Daily Usage Rows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Daily Usage Row'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Daily Usages'), ['controller' => 'DailyUsages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Daily Usage'), ['controller' => 'DailyUsages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Raw Materials'), ['controller' => 'RawMaterials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Raw Material'), ['controller' => 'RawMaterials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dailyUsageRows view large-9 medium-8 columns content">
    <h3><?= h($dailyUsageRow->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Daily Usage') ?></th>
            <td><?= $dailyUsageRow->has('daily_usage') ? $this->Html->link($dailyUsageRow->daily_usage->id, ['controller' => 'DailyUsages', 'action' => 'view', $dailyUsageRow->daily_usage->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Raw Material') ?></th>
            <td><?= $dailyUsageRow->has('raw_material') ? $this->Html->link($dailyUsageRow->raw_material->name, ['controller' => 'RawMaterials', 'action' => 'view', $dailyUsageRow->raw_material->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dailyUsageRow->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($dailyUsageRow->quantity) ?></td>
        </tr>
    </table>
</div>
