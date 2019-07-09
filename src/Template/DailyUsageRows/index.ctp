<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DailyUsageRow[]|\Cake\Collection\CollectionInterface $dailyUsageRows
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Daily Usage Row'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Daily Usages'), ['controller' => 'DailyUsages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Daily Usage'), ['controller' => 'DailyUsages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Raw Materials'), ['controller' => 'RawMaterials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Raw Material'), ['controller' => 'RawMaterials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dailyUsageRows index large-9 medium-8 columns content">
    <h3><?= __('Daily Usage Rows') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('daily_usage_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('raw_material_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dailyUsageRows as $dailyUsageRow): ?>
            <tr>
                <td><?= $this->Number->format($dailyUsageRow->id) ?></td>
                <td><?= $dailyUsageRow->has('daily_usage') ? $this->Html->link($dailyUsageRow->daily_usage->id, ['controller' => 'DailyUsages', 'action' => 'view', $dailyUsageRow->daily_usage->id]) : '' ?></td>
                <td><?= $dailyUsageRow->has('raw_material') ? $this->Html->link($dailyUsageRow->raw_material->name, ['controller' => 'RawMaterials', 'action' => 'view', $dailyUsageRow->raw_material->id]) : '' ?></td>
                <td><?= $this->Number->format($dailyUsageRow->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dailyUsageRow->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dailyUsageRow->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dailyUsageRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dailyUsageRow->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
