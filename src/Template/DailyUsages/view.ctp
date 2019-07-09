<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DailyUsage $dailyUsage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Daily Usage'), ['action' => 'edit', $dailyUsage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Daily Usage'), ['action' => 'delete', $dailyUsage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dailyUsage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Daily Usages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Daily Usage'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Daily Usage Rows'), ['controller' => 'DailyUsageRows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Daily Usage Row'), ['controller' => 'DailyUsageRows', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dailyUsages view large-9 medium-8 columns content">
    <h3><?= h($dailyUsage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dailyUsage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Voucher No') ?></th>
            <td><?= $this->Number->format($dailyUsage->voucher_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Date') ?></th>
            <td><?= h($dailyUsage->transaction_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Daily Usage Rows') ?></h4>
        <?php if (!empty($dailyUsage->daily_usage_rows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Daily Usage Id') ?></th>
                <th scope="col"><?= __('Raw Material Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($dailyUsage->daily_usage_rows as $dailyUsageRows): ?>
            <tr>
                <td><?= h($dailyUsageRows->id) ?></td>
                <td><?= h($dailyUsageRows->daily_usage_id) ?></td>
                <td><?= h($dailyUsageRows->raw_material_id) ?></td>
                <td><?= h($dailyUsageRows->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DailyUsageRows', 'action' => 'view', $dailyUsageRows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DailyUsageRows', 'action' => 'edit', $dailyUsageRows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DailyUsageRows', 'action' => 'delete', $dailyUsageRows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dailyUsageRows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
